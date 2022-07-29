<?php


namespace App\Service;


use App\Entity\Activity;
use App\Entity\ActivityImage;
use App\Entity\Apartment;
use App\Entity\ApartmentImages;
use App\Entity\Car;
use App\Entity\CarImages;
use App\Entity\HouseVilla;
use App\Entity\HouseVillaImages;
use App\Entity\OfficeShopLand;
use App\Entity\OfficeShopLandImages;
use App\Entity\Property;
use App\Entity\PropertyImages;
use App\Entity\Studio;
use App\Entity\StudioImages;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{
    private string $targetDirectory;
    private string $targetActivityImage;
    private SluggerInterface $slugger;

    private const MAX_WIDTH = 2880;
    private const MAX_HEIGHT = 1920;
    private const MAX_WIDTH_CLOGO = 300;

    /**
     * @return string
     */
    public function getTargetActivityImage(): string
    {
        return $this->targetActivityImage;
    }
    private const MAX_HEIGHT_CLOGO = 290;
    private Imagine $imagine;
    /**
     * @return string
     */
    public function getTargetDirectory(): string
    {
        return $this->targetDirectory;
    }

    /**
     * FileUploader constructor.
     * @param string $targetDirectory
     * @param string $targetActivityImage
     * @param SluggerInterface $slugger
     */
    public function __construct(string $targetDirectory, string $targetActivityImage, SluggerInterface $slugger)
    {
        $this->targetDirectory = $targetDirectory;
        $this->targetActivityImage = $targetActivityImage;
        $this->slugger = $slugger;
        $this->imagine = new Imagine();
    }

    public function upload(UploadedFile $file):string{
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(),$fileName);
            $this->resize($this->getTargetDirectory().'/'.$fileName);
        }catch (FileException $exception){
            die("file exception");
        }
        return $fileName;
    }
    public function activityImageUpload(UploadedFile $file):string{
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetActivityImage(),$fileName);
            $this->resize($this->getTargetActivityImage().'/'.$fileName);
        }catch (FileException $exception){
            die("file exception");
        }
        return $fileName;
    }
    
    /**
     * @param UploadedFile $file
     * @return string
     */
    public function uploadCompanyLogo(UploadedFile $file):string{
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(),$fileName);
            $this->resizeCompanyLogo($this->getTargetDirectory().'/'.$fileName);
        }catch (FileException $exception){
            die("file exception");
        }
        return $fileName;
    }
    /**
     * resizing avatar image
     * @param string $filename
     */
    public function resize(string $filename){
        $photo = $this->imagine->open($filename);
        $photo->resize(new Box(self::MAX_WIDTH, self::MAX_HEIGHT))->save($filename);
    }

    /**
     * @param string $filename
     * resize the company's logo
     */
    public function resizeCompanyLogo(string $filename){
        $photo = $this->imagine->open($filename);
        $photo->resize(new Box(self::MAX_WIDTH_CLOGO, self::MAX_HEIGHT_CLOGO))->save($filename);
    }

    public function delete($filename){
        if($filename !== "" && $filename!==null)
            unlink($this->getTargetDirectory().'/'.$filename);
    }
    public function deleteActivityImage($filename){
        if($filename !== "" && $filename!==null)
            unlink($this->getTargetActivityImage().'/'.$filename);
    }
    /**
     * @param $files
     * @param Car $car
     */
    public function uploads($files, Car $car):void{
        foreach ($files as $file){
            $filename = $this->upload($file);
            $carImage = new CarImages();
            $carImage->setFilename($filename);
            $carImage->setUploadAt(new \DateTime('now'));
            $car->addCarImage($carImage);
        }
    }

    /**
     * @param $files
     * @param Apartment $apart
     */
    public function ApartImagesUpload($files, Apartment $apart){
        foreach ($files as $file){
            $filename = $this->upload($file);
            $apartImage = new ApartmentImages();
            $apartImage->setFilename($filename);
            $apartImage->setUpdateAt(new \DateTime('now'));
            $apart->addApartmentImage($apartImage);
        }
    }

    /**
     * @param $images
     * @param HouseVilla $house
     */
    public function houseVillaImagesUpload($images, HouseVilla $house):void{
        foreach ($images as $image){
            $filename = $this->upload($image);
            $houseImage = new HouseVillaImages();
            $houseImage->setFilename($filename);
            $houseImage->setUpdatedAt(new \DateTime('now'));
            $house->addHouseVillaImage($houseImage);
        }
    }

    /**
     * @param $images
     * @param Studio $studio
     */
    public function studioImagesUpload($images, Studio $studio):void{
        foreach ($images as $image){
            $filename = $this->upload($image);
            $studioImage = new StudioImages();
            $studioImage->setFilename($filename);
            $studioImage->setUpdatedAt(new \DateTime('now'));
            $studio->addStudioImage($studioImage);
        }
    }

    /**
     * @param $images
     * @param OfficeShopLand $osl
     */
    public function olsImagesUpload($images, OfficeShopLand $osl):void{
        foreach ($images as $image){
            $filename = $this->upload($image);
            $oslImage = new OfficeShopLandImages();
            $oslImage->setFilename($filename);
            $oslImage->setUpdatedAt(new \DateTime('now'));
            $osl->addOfficeShopLandImage($oslImage);
        }
    }

    /**
     * @param $images
     * @param Activity $activity
     */
    public function activityImagesUpload($images, Activity $activity):void{
        foreach ($images as $image){
            $filename = $this->activityImageUpload($image);
            $actImage = new ActivityImage();
            $actImage->setFilename($filename);
            $actImage->setUploadAt(new \DateTime('now'));
            $activity->addActivityImage($actImage);
        }
    }
}