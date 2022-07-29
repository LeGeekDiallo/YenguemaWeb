<?php


namespace App\Entity;


class ApartFilter
{
    private string $location;
    private int $price;

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return ApartFilter
     */
    public function setLocation(string $location): ApartFilter
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return ApartFilter
     */
    public function setPrice(int $price): ApartFilter
    {
        $this->price = $price;
        return $this;
    }

}