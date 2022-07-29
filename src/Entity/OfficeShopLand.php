<?php

namespace App\Entity;

use App\Repository\OfficeShopLandRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=OfficeShopLandRepository::class)
 */
class OfficeShopLand
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
    private $property_type;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $property_surface;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $proposition_type;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/[1-9]\d+/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $municipality;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $district;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $more_infos_address;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $more_infos;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $ad_title;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="officeShopLands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=OfficeShopLandImages::class, mappedBy="osl", orphanRemoval=true, cascade={"persist"})
     */
    private $officeShopLandImages;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/^[6][2-9][0-9][0-9]{2}[0-9]{2}[0-9]{2}$/",
     *     match=true,
     *     message="Le numero de Tel doit contenir que des nombres et doit être de la forme 6xxxxxxxx"
     * )
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email
     */
    private $email;

    #[Pure]
    public function __construct()
    {
        $this->officeShopLandImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPropertyType(): ?string
    {
        return $this->property_type;
    }

    public function setPropertyType(string $property_type): self
    {
        $this->property_type = $property_type;

        return $this;
    }

    public function getPropertySurface(): ?int
    {
        return $this->property_surface;
    }

    public function setPropertySurface(int $property_surface): self
    {
        $this->property_surface = $property_surface;

        return $this;
    }

    public function getPropositionType(): ?string
    {
        return $this->proposition_type;
    }

    public function setPropositionType(string $proposition_type): self
    {
        $this->proposition_type = $proposition_type;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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

    public function getMunicipality(): ?string
    {
        return $this->municipality;
    }

    public function setMunicipality(string $municipality): self
    {
        $this->municipality = $municipality;

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

    public function getMoreInfosAddress(): ?string
    {
        return $this->more_infos_address;
    }

    public function setMoreInfosAddress(string $more_infos_address): self
    {
        $this->more_infos_address = $more_infos_address;

        return $this;
    }

    public function getMoreInfos(): ?string
    {
        return $this->more_infos;
    }

    public function setMoreInfos(?string $more_infos): self
    {
        $this->more_infos = $more_infos;

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

    public function getAdTitle(): ?string
    {
        return $this->ad_title;
    }

    public function setAdTitle(string $ad_title): self
    {
        $this->ad_title = $ad_title;

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

    /**
     * @return Collection|OfficeShopLandImages[]
     */
    public function getOfficeShopLandImages(): Collection
    {
        return $this->officeShopLandImages;
    }

    public function addOfficeShopLandImage(OfficeShopLandImages $officeShopLandImage): self
    {
        if (!$this->officeShopLandImages->contains($officeShopLandImage)) {
            $this->officeShopLandImages[] = $officeShopLandImage;
            $officeShopLandImage->setOsl($this);
        }

        return $this;
    }

    public function removeOfficeShopLandImage(OfficeShopLandImages $officeShopLandImage): self
    {
        if ($this->officeShopLandImages->removeElement($officeShopLandImage)) {
            // set the owning side to null (unless already changed)
            if ($officeShopLandImage->getOsl() === $this) {
                $officeShopLandImage->setOsl(null);
            }
        }

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSlug():string{
        return (new Slugify())->slugify($this->ad_title);
    }
}
