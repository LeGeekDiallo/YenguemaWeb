<?php

namespace App\Entity;

use App\Repository\OfficeShopLandImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfficeShopLandImagesRepository::class)
 */
class OfficeShopLandImages
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
     * @ORM\ManyToOne(targetEntity=OfficeShopLand::class, inversedBy="officeShopLandImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $osl;

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

    public function getOsl(): ?OfficeShopLand
    {
        return $this->osl;
    }

    public function setOsl(?OfficeShopLand $osl): self
    {
        $this->osl = $osl;

        return $this;
    }
}
