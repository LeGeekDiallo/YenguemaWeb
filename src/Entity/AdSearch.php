<?php


namespace App\Entity;


class AdSearch
{
    private string $keyWord;
    private string $address;

    /**
     * @return string
     */
    public function getKeyWord(): string
    {
        return $this->keyWord;
    }

    /**
     * @param string $keyWord
     * @return AdSearch
     */
    public function setKeyWord(string $keyWord): AdSearch
    {
        $this->keyWord = $keyWord;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return AdSearch
     */
    public function setAddress(string $address): AdSearch
    {
        $this->address = $address;
        return $this;
    }


}