<?php


namespace App\Entity;


class ActivitySearch
{
    private string $category;
    private string $address;


    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return ActivitySearch
     */
    public function setCategory(string $category): ActivitySearch
    {
        $this->category = $category;
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
     * @return ActivitySearch
     */
    public function setAddress(string $address): ActivitySearch
    {
        $this->address = $address;
        return $this;
    }


}