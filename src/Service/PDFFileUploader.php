<?php


namespace App\Service;


use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class PDFFileUploader
{
    public function __construct(private string $pdfDirectory, private SluggerInterface $slugger){}

    public function getDirectory():string{
        return $this->pdfDirectory;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file):string{
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
        try {
            $file->move($this->getDirectory(),$fileName);
        }catch (FileException $exception){
            die("file exception");
        }
        return $fileName;
    }
}