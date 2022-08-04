<?php

namespace App\Entity;

use App\Repository\HouseVillaRepository;
use App\Tools\EntityInfos;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=HouseVillaRepository::class)
 */
class HouseVilla implements EntityInfos
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
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/[1-9]+/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     * @Assert\NotBlank
     */
    private $property_surface;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Regex(
     *     pattern="/[1-9]+/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     * @Assert\NotBlank
     */
    private $room_number;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Regex(
     *     pattern="/[1-9]+/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     * @Assert\NotBlank
     */
    private $bathroom_number;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Regex(
     *     pattern="/[1-9]+/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     * @Assert\NotBlank
     */
    private $wc_number;

    /**
     * @ORM\Column(type="boolean")
     */
    private $furniture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $courtyard;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fenced;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Regex(
     *     pattern="/(1|2)[0-9]{3}/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     * @Assert\NotBlank
     */
    private $build_year;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Regex(
     *     pattern="/[1-9]+/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     * @Assert\NotBlank
     */
    private $floor_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $proposition_type;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex(
     *     pattern="/[1-9]\d+/",
     *     match=true,
     *     message="Valeur non valide"
     * )
     * @Assert\NotBlank
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $municipality;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $district;

    /**
     * @ORM\Column(type="text")
     */
    private $more_infos_address;

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
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $equipements;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $ad_title;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="houseVillas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=HouseVillaImages::class, mappedBy="house_villa", orphanRemoval=true, cascade={"persist"})
     */
    private $houseVillaImages;

    public function __construct()
    {
        $this->houseVillaImages = new ArrayCollection();
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

    public function getPropertySurface(): ?string
    {
        return $this->property_surface;
    }

    public function setPropertySurface(string $property_surface): self
    {
        $this->property_surface = $property_surface;

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

    public function getCourtyard(): ?bool
    {
        return $this->courtyard;
    }

    public function setCourtyard(bool $courtyard): self
    {
        $this->courtyard = $courtyard;

        return $this;
    }

    public function getFenced(): ?bool
    {
        return $this->fenced;
    }

    public function setFenced(bool $fenced): self
    {
        $this->fenced = $fenced;

        return $this;
    }

    public function getBuildYear(): ?int
    {
        return $this->build_year;
    }

    public function setBuildYear(int $build_year): self
    {
        $this->build_year = $build_year;

        return $this;
    }

    public function getFloorNumber(): ?int
    {
        return $this->floor_number;
    }

    public function setFloorNumber(int $floor_number): self
    {
        $this->floor_number = $floor_number;

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

    public function getEquipements(): ?string
    {
        return $this->equipements;
    }

    public function setEquipements(?string $equipements): self
    {
        $this->equipements = $equipements;

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
     * @return Collection|HouseVillaImages[]
     */
    public function getHouseVillaImages(): Collection
    {
        return $this->houseVillaImages;
    }

    public function addHouseVillaImage(HouseVillaImages $houseVillaImage): self
    {
        if (!$this->houseVillaImages->contains($houseVillaImage)) {
            $this->houseVillaImages[] = $houseVillaImage;
            $houseVillaImage->setHouseVilla($this);
        }

        return $this;
    }

    public function removeHouseVillaImage(HouseVillaImages $houseVillaImage): self
    {
        if ($this->houseVillaImages->removeElement($houseVillaImage)) {
            // set the owning side to null (unless already changed)
            if ($houseVillaImage->getHouseVilla() === $this) {
                $houseVillaImage->setHouseVilla(null);
            }
        }

        return $this;
    }

    public function getSlug():string{
        return (new Slugify())->slugify($this->ad_title);
    }

    public function getInfos(): array
    {
        $infos = [];
        foreach ($this as $item=>$value){
            if($item != "user" and $item != "houseVillaImages") {
                $infos[$item] = $value;
            }
        }
        $filename = [];
        foreach ($this->getHouseVillaImages() as $image){
            $filename[] = $image->getFilename();
        }
        $infos["images"] = $filename;
        $infos["imagesURL"] = "https://leyenguema.com/compagnies_logo/";
        return $infos;
    }
}
