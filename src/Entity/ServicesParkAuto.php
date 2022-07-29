<?php

namespace App\Entity;

use App\Repository\ServicesParkAutoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicesParkAutoRepository::class)
 */
class ServicesParkAuto
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
    private $service_name;

    /**
     * @ORM\ManyToOne(targetEntity=ParkAuto::class, inversedBy="services")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parkAuto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceName(): ?string
    {
        return $this->service_name;
    }

    public function setServiceName(string $service_name): self
    {
        $this->service_name = $service_name;

        return $this;
    }

    public function getParkAuto(): ?ParkAuto
    {
        return $this->parkAuto;
    }

    public function setParkAuto(?ParkAuto $parkAuto): self
    {
        $this->parkAuto = $parkAuto;

        return $this;
    }
}
