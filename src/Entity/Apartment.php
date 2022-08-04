<?php

namespace App\Entity;

use App\Repository\ApartmentRepository;
use App\Tools\EntityInfos;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ApartmentRepository::class)
 */
class Apartment implements EntityInfos
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
    private $property_type;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     */
    private $property_surface;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     */
    private $appart_floor;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     */
    private $room_number;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     */
    private $bathroom_number;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     */
    private $wc_number;

    /**
     * @ORM\Column(type="boolean")
     */
    private $furniture;

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
    private $more_details_address;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_infos;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

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

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $ad_title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $equipements;


    /**
     * @ORM\OneToMany(targetEntity=AdditionalSurfaces::class, mappedBy="apartment", orphanRemoval=true, cascade={"persist"})
     */
    private $additionalSurfaces;

    /**
     * @ORM\OneToMany(targetEntity=ApartmentImages::class, mappedBy="apartment", orphanRemoval=true, cascade={"persist"})
     * @Assert\NotBlank
     */
    private $apartmentImages;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="apartments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->additionalSurfaces = new ArrayCollection();
        $this->apartmentImages = new ArrayCollection();
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

    public function getAppartFloor(): ?int
    {
        return $this->appart_floor;
    }

    public function setAppartFloor(int $appart_floor): self
    {
        $this->appart_floor = $appart_floor;

        return $this;
    }

    public function getRoomNumber(): ?int
    {
        return $this->room_number;
    }

    public function setRoomNumber(int $room_number): self
    {
        $this->room_number = $room_number;

        return $this;
    }

    public function getBathroomNumber(): ?int
    {
        return $this->bathroom_number;
    }

    public function setBathroomNumber(int $bathroom_number): self
    {
        $this->bathroom_number = $bathroom_number;

        return $this;
    }

    public function getWcNumber(): ?int
    {
        return $this->wc_number;
    }

    public function setWcNumber(int $wc_number): self
    {
        $this->wc_number = $wc_number;

        return $this;
    }

    public function getFurniture(): ?bool
    {
        return $this->furniture;
    }

    public function setFurniture(bool $furniture): self
    {
        $this->furniture = $furniture;

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

    public function getMoreDetailsAddress(): ?string
    {
        return $this->more_details_address;
    }

    public function setMoreDetailsAddress(string $more_details_address): self
    {
        $this->more_details_address = $more_details_address;

        return $this;
    }

    public function getOtherInfos(): ?string
    {
        return $this->other_infos;
    }

    public function setOtherInfos(?string $other_infos): self
    {
        $this->other_infos = $other_infos;

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

    public function getAdTitle(): ?string
    {
        return $this->ad_title;
    }

    public function setAdTitle(string $ad_title): self
    {
        $this->ad_title = $ad_title;

        return $this;
    }

    public function getEquipements(): ?string
    {
        return $this->equipements;
    }

    public function setEquipements(?string $equipements): self
    {
        $this->equipements = $equipements;

        return $this;
    }

    /**
     * @return Collection|AdditionalSurfaces[]
     */
    public function getAdditionalSurfaces(): Collection
    {
        return $this->additionalSurfaces;
    }

    public function addAdditionalSurface(AdditionalSurfaces $additionalSurface): self
    {
        if (!$this->additionalSurfaces->contains($additionalSurface)) {
            $this->additionalSurfaces[] = $additionalSurface;
            $additionalSurface->setApartment($this);
        }

        return $this;
    }

    public function removeAdditionalSurface(AdditionalSurfaces $additionalSurface): self
    {
        if ($this->additionalSurfaces->removeElement($additionalSurface)) {
            // set the owning side to null (unless already changed)
            if ($additionalSurface->getApartment() === $this) {
                $additionalSurface->setApartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ApartmentImages[]
     */
    public function getApartmentImages(): Collection
    {
        return $this->apartmentImages;
    }

    public function addApartmentImage(ApartmentImages $apartmentImage): self
    {
        if (!$this->apartmentImages->contains($apartmentImage)) {
            $this->apartmentImages[] = $apartmentImage;
            $apartmentImage->setApartment($this);
        }

        return $this;
    }

    public function removeApartmentImage(ApartmentImages $apartmentImage): self
    {
        if ($this->apartmentImages->removeElement($apartmentImage)) {
            // set the owning side to null (unless already changed)
            if ($apartmentImage->getApartment() === $this) {
                $apartmentImage->setApartment(null);
            }
        }

        return $this;
    }

    public function getSlug():string{
        return (new Slugify())->slugify($this->ad_title);
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

    public function getInfos(): array
    {
        $infos = [];
        foreach ($this as $item=>$value){
            if($item != "user" and $item != "apartmentImages" and "additionalSurfaces") {
                $infos[$item] = $value;
            }
        }
        $filename = [];
        foreach ($this->getApartmentImages() as $image){
            $filename[] = $image->getFilename();
        }
        $addSurfaces = array();
        foreach ($this->getAdditionalSurfaces() as $surface){
            $addSurfaces[] = $surface->getAdditionalSurfaceName();
        }
        $infos["images"] = $filename;
        $infos["additionalSurfaces"] = $addSurfaces;
        $infos["imagesURL"] = "https://leyenguema.com/compagnies_logo/";
        return $infos;
    }
}
