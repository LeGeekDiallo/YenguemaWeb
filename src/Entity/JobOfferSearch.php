<?php


namespace App\Entity;


class JobOfferSearch
{
    private string $job_title;
    private string $address;

    /**
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->job_title;
    }

    /**
     * @param string $job_title
     * @return JobOfferSearch
     */
    public function setJobTitle(string $job_title): JobOfferSearch
    {
        $this->job_title = $job_title;
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
     * @return JobOfferSearch
     */
    public function setAddress(string $address): JobOfferSearch
    {
        $this->address = $address;
        return $this;
    }


}