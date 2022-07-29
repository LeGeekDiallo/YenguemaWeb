<?php

namespace App\Entity;

use App\Repository\AdImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdImagesRepository::class)
 */
class AdImages
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Ads::class, inversedBy="adPhotos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ad;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $uploadAt;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAd(): ?Ads
    {
        return $this->ad;
    }

    public function setAd(?Ads $ad): self
    {
        $this->ad = $ad;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getUploadAt(): ?\DateTimeInterface
    {
        return $this->uploadAt;
    }

    public function setUploadAt(\DateTimeInterface $uploadAt): self
    {
        $this->uploadAt = $uploadAt;

        return $this;
    }
}
