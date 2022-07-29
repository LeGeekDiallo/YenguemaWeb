<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
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
     */
    private $car_brand;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $car_model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fuel;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(
     *     pattern="/[0-9]+$/",
     *     match=true,
     *     message="Valeur non autorisée, seulement des chiffres"
     * )
     */
    private $mileage;

    /**
     * @ORM\Column(type="string", length=4)
     * @Assert\Regex(
     *     pattern="/(1|2)[0-9]{3}/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     * @Assert\NotBlank
     */
    private $car_year;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/[a-zA-Z]+/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     * @Assert\Length(min=6, minMessage="Valeur non autorisé, minimum 6 caractère")
     */
    private $car_country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $car_class;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex(
     *     pattern="/\d+/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     * @Assert\NotBlank
     */
    private $car_nb_places;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex(
     *     pattern="/\d+/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     * @Assert\NotBlank
     */
    private $car_nb_doors;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $car_color;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $car_state;


    /**
     * @ORM\OneToMany(targetEntity=CarAdvantages::class, mappedBy="car", orphanRemoval=true, cascade={"persist"})
     */
    private $car_advantages;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=ParkAuto::class, inversedBy="vehicles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $park_auto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transmission_type;

    /**
     * @ORM\OneToMany(targetEntity=CarImages::class, mappedBy="car", orphanRemoval=true, cascade={"persist"})
     */
    private $carImages;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/\d+/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     * @Assert\NotBlank
     */
    private $car_price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sale_state;

    public function __construct()
    {
        $this->car_advantages = new ArrayCollection();
        $this->carImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCarModel(): ?string
    {
        return $this->car_model;
    }

    public function setCarModel(string $car_model): self
    {
        $this->car_model = $car_model;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getMileage(): ?string
    {
        return $this->mileage;
    }

    public function setMileage(string $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getCarYear(): ?string
    {
        return $this->car_year;
    }

    public function setCarYear(string $car_year): self
    {
        $this->car_year = $car_year;

        return $this;
    }

    public function getCarCountry(): ?string
    {
        return $this->car_country;
    }

    public function setCarCountry(string $car_country): self
    {
        $this->car_country = $car_country;

        return $this;
    }

    public function getCarClass(): ?string
    {
        return $this->car_class;
    }

    public function setCarClass(string $car_class): self
    {
        $this->car_class = $car_class;

        return $this;
    }

    public function getCarNbPlaces(): ?int
    {
        return $this->car_nb_places;
    }

    public function setCarNbPlaces(int $car_nb_places): self
    {
        $this->car_nb_places = $car_nb_places;

        return $this;
    }

    public function getCarNbDoors(): ?int
    {
        return $this->car_nb_doors;
    }

    public function setCarNbDoors(int $car_nb_doors): self
    {
        $this->car_nb_doors = $car_nb_doors;

        return $this;
    }

    public function getCarColor(): ?string
    {
        return $this->car_color;
    }

    public function setCarColor(string $car_color): self
    {
        $this->car_color = $car_color;

        return $this;
    }

    public function getCarState(): ?string
    {
        return $this->car_state;
    }

    public function setCarState(string $car_state): self
    {
        $this->car_state = $car_state;

        return $this;
    }

    public function getParkAuto(): ?ParkAuto
    {
        return $this->park_auto;
    }

    public function setParkAuto(?ParkAuto $park_auto): self
    {
        $this->park_auto = $park_auto;

        return $this;
    }

    /**
     * @return Collection|CarAdvantages[]
     */
    public function getCarAdvantages(): Collection
    {
        return $this->car_advantages;
    }

    public function addCarAdvantage(CarAdvantages $carAdvantage): self
    {
        if (!$this->car_advantages->contains($carAdvantage)) {
            $this->car_advantages[] = $carAdvantage;
            $carAdvantage->setCar($this);
        }

        return $this;
    }

    public function removeCarAdvantage(CarAdvantages $carAdvantage): self
    {
        if ($this->car_advantages->removeElement($carAdvantage)) {
            // set the owning side to null (unless already changed)
            if ($carAdvantage->getCar() === $this) {
                $carAdvantage->setCar(null);
            }
        }

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

    public function getTransmissionType(): ?string
    {
        return $this->transmission_type;
    }

    public function setTransmissionType(string $transmission_type): self
    {
        $this->transmission_type = $transmission_type;

        return $this;
    }

    /**
     * @return Collection|CarImages[]
     */
    public function getCarImages(): Collection
    {
        return $this->carImages;
    }

    public function addCarImage(CarImages $carImage): self
    {
        if (!$this->carImages->contains($carImage)) {
            $this->carImages[] = $carImage;
            $carImage->setCar($this);
        }

        return $this;
    }

    public function removeCarImage(CarImages $carImage): self
    {
        if ($this->carImages->removeElement($carImage)) {
            // set the owning side to null (unless already changed)
            if ($carImage->getCar() === $this) {
                $carImage->setCar(null);
            }
        }

        return $this;
    }

    public function getCarPrice(): ?string
    {
        return $this->car_price;
    }

    public function setCarPrice(string $car_price): self
    {
        $this->car_price = $car_price;

        return $this;
    }

    public function getSlug():string{
        return (new Slugify())->slugify($this->car_brand);
    }

    public function getSaleState(): ?bool
    {
        return $this->sale_state;
    }

    public function setSaleState(bool $sale_state): self
    {
        $this->sale_state = $sale_state;

        return $this;
    }
}
