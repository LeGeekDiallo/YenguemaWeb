<?php

namespace App\Entity;

use App\Repository\AdsRepository;
use App\Tools\EntityInfos;
use App\Validator\ImagesNumber;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AdsRepository::class)
 * @ORM\Table(name="ads", indexes={@ORM\Index(columns={"ad_title", "ad_type", "details"}, flags={"fulltext"})})
 */
class Ads implements EntityInfos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10)
     * @Assert\NotBlank
     */
    private $adTitle;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=6)
     * @Assert\NotBlank
     * @Assert\Regex(pattern="/[0-9]$/")
     */
    private $adPrice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adCategory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=3)
     */
    private $brand;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=3)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=5)
     */
    private $mileage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=4)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     * @@Assert\Length(min=5, minMessage="La ville doit contenir au moins 5 caratères")
     * @Assert\NotBlank
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, minMessage="La commune doit contenir au moins 5 caratères")
     * @Assert\NotBlank
     */
    private $municipality;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length (min=5, minMessage="L'adresse doit contenir au moins 5 caratères")
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/^[6][2-9][0-9][0-9]{2}[0-9]{2}[0-9]{2}$/",
     *     match=true,
     *     message="Le numero de Tel doit contenir que des nombres et doit être de la forme 6xxxxxxxx"
     * )
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=150, minMessage="Text assez court, minimum 150 caractères")
     * @Assert\NotBlank
     */
    private $details;



    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=AdImages::class, mappedBy="ad", orphanRemoval=true, cascade={"persist"})
     */
    private $adPhotos;

    /**
     * @var string
     */
    private string $adImages;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $vehicle_type;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $adState;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $transmission_type;

    public function getSlug():string{
        return (new Slugify())->slugify($this->adTitle);
    }
    public function __construct()
    {
        $this->adPhotos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdTitle(): ?string
    {
        return $this->adTitle;
    }

    public function setAdTitle(string $adTitle): self
    {
        $this->adTitle = $adTitle;

        return $this;
    }

    public function getAdPrice(): ?string
    {
        return $this->adPrice;
    }

    public function setAdPrice(string $adPrice): self
    {
        $this->adPrice = $adPrice;

        return $this;
    }

    public function getAdCategory(): ?string
    {
        return $this->adCategory;
    }

    public function setAdCategory(string $adCategory): self
    {
        $this->adCategory = $adCategory;

        return $this;
    }

    public function getAdType(): ?string
    {
        return $this->adType;
    }

    public function setAdType(string $adType): self
    {
        $this->adType = $adType;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getMileage(): ?string
    {
        return $this->mileage;
    }

    public function setMileage(?string $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

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
     * @return Collection|AdImages[]
     */
    public function getAdPhotos(): Collection
    {
        return $this->adPhotos;
    }

    public function addAdPhoto(AdImages $adPhoto): self
    {
        if (!$this->adPhotos->contains($adPhoto)) {
            $this->adPhotos[] = $adPhoto;
            $adPhoto->setAd($this);
        }

        return $this;
    }

    public function removeAdPhoto(AdImages $adPhoto): self
    {
        if ($this->adPhotos->removeElement($adPhoto)) {
            // set the owning side to null (unless already changed)
            if ($adPhoto->getAd() === $this) {
                $adPhoto->setAd(null);
            }
        }

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

    public function getVehicleType(): ?string
    {
        return $this->vehicle_type;
    }

    public function setVehicleType(?string $vehicle_type): self
    {
        $this->vehicle_type = $vehicle_type;

        return $this;
    }

    public function getAdState(): ?string
    {
        return $this->adState;
    }

    public function setAdState(string $adState): self
    {
        $this->adState = $adState;

        return $this;
    }

    public function getTransmissionType(): ?string
    {
        return $this->transmission_type;
    }

    public function setTransmissionType(?string $transmission_type): self
    {
        $this->transmission_type = $transmission_type;

        return $this;
    }

    public function getInfos():array{
        $infos = [];
        foreach ($this as $item=>$value){
            if($item != "user" and $item != "adPhotos") {
                $infos[$item] = $value;
            }
        }
        $filename = [];
        foreach ($this->getAdPhotos() as $image){
            $filename[] = $image->getImageName();
        }
        $infos["images"] = $filename;
        $infos["imagesURL"] = "https://leyenguema.com/images/ad_images/";
        return $infos;
    }
}
