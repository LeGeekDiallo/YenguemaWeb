<?php


namespace App\Entity;


class EBookSearch
{
    private string $ebook_name;

    /**
     * @return string
     */
    public function getEbookName(): string
    {
        return $this->ebook_name;
    }

    /**
     * @param string $ebook_name
     * @return EBookSearch
     */
    public function setEbookName(string $ebook_name): EBookSearch
    {
        $this->ebook_name = $ebook_name;
        return $this;
    }
}