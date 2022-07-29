<?php

namespace App\Entity;

use App\Repository\TaxiDriverRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TaxiDriverRepository::class)
 */
class TaxiDriver
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $driver_full_name;

    /**
     * @ORM\Column(type="string", length=12)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/(RG)-\d{4}-[A-Z]{2}/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     */
    private $registration_number;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     * @Assert\Regex(
     *     pattern="/^[6][2-9][0-9][0-9]{2}[0-9]{2}[0-9]{2}$/",
     *     match=true,
     *     message="Le numero de Tel doit contenir que des nombres et doit être de la forme 6xxxxxxxx"
     * )
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taxi_type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $district;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="taxiDriver", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $municipality;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taxi_brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taxi_model;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDriverFullName(): ?string
    {
        return $this->driver_full_name;
    }

    public function setDriverFullName(?string $driver_full_name): self
    {
        $this->driver_full_name = $driver_full_name;

        return $this;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registration_number;
    }

    public function setRegistrationNumber(string $registration_number): self
    {
        $this->registration_number = $registration_number;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getTaxiType(): ?string
    {
        return $this->taxi_type;
    }

    public function setTaxiType(string $taxi_type): self
    {
        $this->taxi_type = $taxi_type;

        return $this;
    }

    public function getState(): ?bool
    {
        return $this->state;
    }

    public function setState(bool $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function setDistrict(string $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMunicipality(): ?string
    {
        return $this->municipality;
    }

    public function setMunicipality(string $municipality): self
    {
        $this->municipality = $municipality;

        return $this;
    }

    public function getTaxiBrand(): ?string
    {
        return $this->taxi_brand;
    }

    public function setTaxiBrand(string $taxi_brand): self
    {
        $this->taxi_brand = $taxi_brand;

        return $this;
    }

    public function getTaxiModel(): ?string
    {
        return $this->taxi_model;
    }

    public function setTaxiModel(string $taxi_model): self
    {
        $this->taxi_model = $taxi_model;

        return $this;
    }
    public function getSlug():string{
        return (new Slugify())->slugify($this->taxi_type);
    }
}
