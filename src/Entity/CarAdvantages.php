<?php

namespace App\Entity;

use App\Repository\CarAdvantagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarAdvantagesRepository::class)
 */
class CarAdvantages
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
    private $advantage_name;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="car_advantages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdvantageName(): ?string
    {
        return $this->advantage_name;
    }

    public function setAdvantageName(string $advantage_name): self
    {
        $this->advantage_name = $advantage_name;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }
}
