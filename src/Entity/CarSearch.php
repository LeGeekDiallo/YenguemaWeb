<?php


namespace App\Entity;


class CarSearch
{
    private string $model;
    private string $price;
    private string $year;
    private string $mileage;
    private int $park_auto_id;

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return CarSearch
     */
    public function setModel(string $model): CarSearch
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return CarSearch
     */
    public function setPrice(string $price): CarSearch
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param string $year
     * @return CarSearch
     */
    public function setYear(string $year): CarSearch
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return string
     */
    public function getMileage(): string
    {
        return $this->mileage;
    }

    /**
     * @param string $mileage
     * @return CarSearch
     */
    public function setMileage(string $mileage): CarSearch
    {
        $this->mileage = $mileage;
        return $this;
    }

    /**
     * @return int
     */
    public function getParkAutoId(): int
    {
        return $this->park_auto_id;
    }

    /**
     * @param int $park_auto_id
     * @return CarSearch
     */
    public function setParkAutoId(int $park_auto_id): CarSearch
    {
        $this->park_auto_id = $park_auto_id;
        return $this;
    }

    public function generate_year_list(int $debut, int $nb_year):array{
        $list_year = array();
        for($i=0; $i<=$nb_year; $i++){
            $list_year[($debut+$i)] = ($debut+$i).'';
        }
        return $list_year;
    }
}