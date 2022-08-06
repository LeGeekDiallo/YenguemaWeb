<?php


namespace App\Tools;


class DeleteFile
{
    private string $fileName;
    private string $directory;

    /**
     * DeleteFile constructor.
     * @param string $fileName
     * @param string $directory
     */
    public function __construct(string $fileName, string $directory)
    {
        $this->fileName = $fileName;
        $this->directory = $directory;
    }


    public function deleteFile():void{
        if($this->fileName !== "")
            unlink($this->directory.'/'.$this->fileName);
    }
}