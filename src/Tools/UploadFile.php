<?php


namespace App\Tools;


use App\Entity\AdImages;
use App\Entity\Ads;
use Exception;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class UploadFile
{
    private const MAX_WIDTH = 1665;
    private const MAX_HEIGHT = 1141;
    private const MAX_AVATAR_WIDTH = 500;
    private const MAX_AVATAR_HEIGHT = 332;

    private Imagine $imagine;

    /**
     * UploadFile constructor.
     */
    public function __construct()
    {
        $this->imagine = new Imagine();
    }

    /**
     * resizing avatar image
     * @param string $filename
     */
    public function resize(string $filename){
        list($avwidth, $avheight) = getimagesize($filename);
        $ratio = $avwidth/$avheight;
        $width = self::MAX_WIDTH;
        $height = self::MAX_HEIGHT;

        if(($width/$height) > $ratio){
            $width = $height*$ratio;
        }else{
            $height = $width/$ratio;
        }

        $photo = $this->imagine->open($filename);
        $photo->resize(new Box($width, $height))->save($filename);
    }
    /**
     * resizing avatar image
     * @param string $filename
     */
    public function avatarResize(string $filename){
        list($avwidth, $avheight) = getimagesize($filename);
        $ratio = $avwidth/$avheight;
        $width = self::MAX_AVATAR_WIDTH;
        $height = self::MAX_AVATAR_HEIGHT;

        if(($width/$height) > $ratio){
            $width = $height*$ratio;
        }else{
            $height = $width/$ratio;
        }

        $photo = $this->imagine->open($filename);
        $photo->resize(new Box($width, $height))->save($filename);
    }
    /**
     * @param $form
     * @param string $fileDir
     * @return string
     * @throws Exception
     */
    public function loadFile($form, string $fileDir):string{
        $filename = "";
        if($avatar = $form->get('imageName')->getData()) {
            $filename = $this->imageMove($avatar, $fileDir);
        }
        return $filename;
    }
    /**
     * @param $form
     * @param string $fileDir
     * @return string
     * @throws Exception
     */
    public function loadAvatarFile($form, string $fileDir):string{
        $filename = "";
        if($avatar = $form->get('imageName')->getData()) {
            $filename = $this->avatarMove($avatar, $fileDir);
        }
        return $filename;
    }

    /**
     * @param $form
     * @param string $fileDir
     * @param string $fileTitle
     * @return string
     */
    public function loadEbookSubjectFile($form, string $fileDir, string $fileTitle):string{
        $fileName = "";
        if($file = $form['filename']->getData()) {
            $fileName = $this->fileMove($fileTitle, $file, $fileDir);
        }
        return $fileName;
    }

    /**
     * @param $image
     * @param string $fileDir
     * @return string
     * @throws Exception
     */
    private function avatarMove($image, string $fileDir):string{
        $filename = bin2hex(random_bytes(6)).'.'.$image->guessExtension();
        try{
            $image->move($fileDir, $filename);
            $this->avatarResize($fileDir.'/'.$filename);
            return $filename;
        }catch (FileException $e){}
    }

    /**
     * @param $fileTitle
     * @param $file
     * @param string $fileDir
     * @return string
     */
    private function fileMove($fileTitle, $file, string $fileDir):string{
        $filename = $fileTitle.'.'.$file->guessExtension();
        try{
            $file->move($fileDir, $filename);
            return $filename;
        }catch (FileException $e){}
        return $filename;
    }
    /**
     * moving image
     * @param $image
     * @param string $fileDir
     * @return string
     * @throws Exception
     */
    private function imageMove($image, string $fileDir):string{
        $filename = bin2hex(random_bytes(6)).'.'.$image->guessExtension();
        try{
            $image->move($fileDir, $filename);
            $this->resize($fileDir.'/'.$filename);
            return $filename;
        }catch (FileException $e){}
    }


    /**
     * @param $form
     * @param string $olfImageName
     * @param string $fileDir
     * @return string
     * @throws Exception
     */
    public function uploadFile($form, string $olfImageName, string $fileDir):string{
        $deleteOldImageFile = new DeleteFile($olfImageName, $fileDir);
        $filename = $this->loadAvatarFile($form, $fileDir);
        if($avatar = $form['imageName']->getData()){
            $deleteOldImageFile->deleteFile();
        }
        return $filename;
    }

    public function loadFiles($form, string $fileDir, Ads $ads){
        if($images = $form['adPhotos']->getData()){
            foreach ($images as $image ){
                $filename = $this->imageMove($image, $fileDir);
                $adImage = new AdImages();
                $adImage->setImageName($filename);
                $adImage->setUploadAt(new \DateTime('now'));
                $ads->addAdPhoto($adImage);
            }
        }
    }
}