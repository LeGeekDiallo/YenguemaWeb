<?php


namespace App\Entity;


class ParkAutoSearch
{
    private string $parkName;
    private string $address;

    /**
     * @return string
     */
    public function getParkName(): string
    {
        return $this->parkName;
    }

    /**
     * @param string $parkName
     * @return ParkAutoSearch
     */
    public function setParkName(string $parkName): ParkAutoSearch
    {
        $this->parkName = $parkName;
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
     * @return ParkAutoSearch
     */
    public function setAddress(string $address): ParkAutoSearch
    {
        $this->address = $address;
        return $this;
    }

}