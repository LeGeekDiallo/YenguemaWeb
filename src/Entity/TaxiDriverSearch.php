<?php


namespace App\Entity;


class TaxiDriverSearch
{
    private string $location;

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return TaxiDriverSearch
     */
    public function setLocation(string $location): TaxiDriverSearch
    {
        $this->location = $location;
        return $this;
    }

}