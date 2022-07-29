<?php


namespace App\Entity;


use Symfony\Component\Validator\Constraints as Assert;

class RideSearch
{
    private string $departure;
    private string $destination;

    /**
     * @var \DateTime
     * @Assert\GreaterThanOrEqual("today UTC")
     */
    private \DateTime $date_depart;

    /**
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->departure;
    }

    /**
     * @param string $departure
     * @return RideSearch
     */
    public function setDeparture(string $departure): RideSearch
    {
        $this->departure = $departure;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     * @return RideSearch
     */
    public function setDestination(string $destination): RideSearch
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDepart(): \DateTime
    {
        return $this->date_depart;
    }

    /**
     * @param \DateTime $date_depart
     * @return RideSearch
     */
    public function setDateDepart(\DateTime $date_depart): RideSearch
    {
        $this->date_depart = $date_depart;
        return $this;
    }
}