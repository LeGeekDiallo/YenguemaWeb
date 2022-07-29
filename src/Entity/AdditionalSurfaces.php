<?php

namespace App\Entity;

use App\Repository\AdditionalSurfacesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdditionalSurfacesRepository::class)
 */
class AdditionalSurfaces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $additional_surface_name;

    /**
     * @ORM\ManyToOne(targetEntity=Apartment::class, inversedBy="additionalSurfaces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $apartment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdditionalSurfaceName(): ?string
    {
        return $this->additional_surface_name;
    }

    public function setAdditionalSurfaceName(string $additional_surface_name): self
    {
        $this->additional_surface_name = $additional_surface_name;

        return $this;
    }

    public function getApartment(): ?Apartment
    {
        return $this->apartment;
    }

    public function setApartment(?Apartment $apartment): self
    {
        $this->apartment = $apartment;

        return $this;
    }
}
