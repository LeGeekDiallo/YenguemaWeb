<?php

namespace App\Entity;

use App\Repository\RideRepository;
use App\Tools\EntityInfos;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RideRepository::class)
 */
class Ride implements EntityInfos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\NotEqualTo(propertyPath="destination")
     */
    private $departure;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $destination;

    /**
     * @ORM\Column(type="time")
     */
    private $departure_time;

    /**
     * @ORM\Column(type="time")
     * @Assert\GreaterThanOrEqual(
     *     propertyPath="departure_time"
     * )
     */
    private $arriving_time;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\GreaterThanOrEqual("today UTC")
     */
    private $departure_date;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\GreaterThanOrEqual(
     *     propertyPath="departure_date"
     * )
     */
    private $arriving_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rides")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $car_brand;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/\d+/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     */
    private $place_number;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_details;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ride_type;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/\d+/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     */
    private $ride_price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeparture(): ?string
    {
        return $this->departure;
    }

    public function setDeparture(string $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departure_time;
    }

    public function setDepartureTime(\DateTimeInterface $departure_time): self
    {
        $this->departure_time = $departure_time;

        return $this;
    }

    public function getArrivingTime(): ?\DateTimeInterface
    {
        return $this->arriving_time;
    }

    public function setArrivingTime(\DateTimeInterface $arriving_time): self
    {
        $this->arriving_time = $arriving_time;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departure_date;
    }

    public function setDepartureDate(\DateTimeInterface $departure_date): self
    {
        $this->departure_date = $departure_date;

        return $this;
    }

    public function getArrivingAt(): ?\DateTimeInterface
    {
        return $this->arriving_at;
    }

    public function setArrivingAt(\DateTimeInterface $arriving_at): self
    {
        $this->arriving_at = $arriving_at;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCarBrand(): ?string
    {
        return $this->car_brand;
    }

    public function setCarBrand(string $car_brand): self
    {
        $this->car_brand = $car_brand;

        return $this;
    }

    public function getPlaceNumber(): ?int
    {
        return $this->place_number;
    }

    public function setPlaceNumber(int $place_number): self
    {
        $this->place_number = $place_number;

        return $this;
    }

    public function getOtherDetails(): ?string
    {
        return $this->other_details;
    }

    public function setOtherDetails(?string $other_details): self
    {
        $this->other_details = $other_details;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getRideType(): ?string
    {
        return $this->ride_type;
    }

    public function setRideType(string $ride_type): self
    {
        $this->ride_type = $ride_type;

        return $this;
    }

    public function getRidePrice(): ?int
    {
        return $this->ride_price;
    }

    public function setRidePrice(int $ride_price): self
    {
        $this->ride_price = $ride_price;

        return $this;
    }
    public function getSlug():string{
        return (new Slugify())->slugify($this->departure.' '.$this->destination);
    }

    public function getInfos(): array
    {
        $infos = [];
        foreach ($this as $item=>$value){
            if($item != "user" and $item) {
                $infos[$item] = $value;
            }
        }
        return $infos;
    }
}
