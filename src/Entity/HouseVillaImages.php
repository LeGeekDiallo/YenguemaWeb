<?php

namespace App\Entity;

use App\Repository\HouseVillaImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HouseVillaImagesRepository::class)
 */
class HouseVillaImages
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
    private $filename;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=HouseVilla::class, inversedBy="houseVillaImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $house_villa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getHouseVilla(): ?HouseVilla
    {
        return $this->house_villa;
    }

    public function setHouseVilla(?HouseVilla $house_villa): self
    {
        $this->house_villa = $house_villa;

        return $this;
    }
}
