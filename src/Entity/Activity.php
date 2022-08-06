<?php

namespace App\Entity;

use App\Tools\EntityInfos;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity implements EntityInfos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, minMessage="Ce nom est très court minimum 3 caractères")
     * @Assert\NotBlank
     */
    private $activity_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length (min=5, minMessage="L'adresse doit contenir au moins 5 caratères")
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=9, minMessage="Le numéro de téléphone n'est pas valide")
     * @Assert\Regex(
     *     pattern="/^[6][2-9][0-9][0-9]{2}[0-9]{2}[0-9]{2}$/",
     *     match=true,
     *     message="Le numero de Tel doit contenir que des nombres et sans espaces et doit être de la forme 6xxxxxxxx"
     * )
     */
    private $phone_number;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="activity")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=150, minMessage="Text assez court, minimum 150 caractères")
     */
    private $details;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, minMessage="La ville doit contenir au moins 5 caratères")
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $likes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $unlikes;

    /**
     * @ORM\OneToMany(targetEntity=ActivityImage::class, mappedBy="activity", orphanRemoval=true, cascade={"persist"})
     */
    private $activityImages;

    public function __construct()
    {
        $this->activityImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug():string{
        return (new Slugify())->slugify($this->activity_name);
    }

    public function getActivityName(): ?string
    {
        return $this->activity_name;
    }

    public function setActivityName(string $activity_name): self
    {
        $this->activity_name = $activity_name;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

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

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    public function getLikes(): ?int
    {
        return $this->likes;
    }

    public function setLikes(?int $likes): self
    {
        $this->likes = $likes;

        return $this;
    }

    public function getUnlikes(): ?int
    {
        return $this->unlikes;
    }

    public function setUnlikes(?int $unlikes): self
    {
        $this->unlikes = $unlikes;

        return $this;
    }

    public function __toString():string
    {
       return $this->activity_name;
    }

    /**
     * @return Collection|ActivityImage[]
     */
    public function getActivityImages(): Collection
    {
        return $this->activityImages;
    }

    public function addActivityImage(ActivityImage $activityImage): self
    {
        if (!$this->activityImages->contains($activityImage)) {
            $this->activityImages[] = $activityImage;
            $activityImage->setActivity($this);
        }

        return $this;
    }

    public function removeActivityImage(ActivityImage $activityImage): self
    {
        if ($this->activityImages->removeElement($activityImage)) {
            // set the owning side to null (unless already changed)
            if ($activityImage->getActivity() === $this) {
                $activityImage->setActivity(null);
            }
        }

        return $this;
    }

    public function getInfos(): array{
        $infos = [];
        foreach ($this as $item=>$value){
            if($item != "user" and $item != "activityImages") {
                $infos[$item] = $value;
            }
        }
        $filename = [];
        foreach ($this->getActivityImages() as $image){
            $filename[] = $image->getFilename();
        }
        $infos["images"] = $filename;
        $infos["imagesURL"] = "https://leyenguema.com/images/activity_image/";
        return $infos;
    }
}
