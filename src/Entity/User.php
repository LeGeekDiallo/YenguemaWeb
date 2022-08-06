<?php

namespace App\Entity;

use App\Controller\SecurityController;
use App\Repository\UserRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\EqualTo(propertyPath="confirm_password", message="Les deux mots de passes sont differents")
     */
    private $password;

    /**
     * @var string
     * @Assert\EqualTo(propertyPath="password")
     */
    private string $confirm_password="";

    /**
     * @return string
     */
    public function getConfirmPassword(): string
    {
        return $this->confirm_password;
    }

    /**
     * @param string $confirm_password
     */
    public function setConfirmPassword(string $confirm_password): void
    {
        $this->confirm_password = $confirm_password;
    }
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Regex("/^[a-zA-z\s]+$/")
     */
    private string $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/^[6][2-9][0-9][0-9]{2}[0-9]{2}[0-9]{2}$/",
     *     match=true,
     *     message="Le numero de Tel doit contenir que des nombres sans espace"
     * )
     */
    private ?string $phoneNumber;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private ?int $sexe;

    /**
     * @ORM\Column(type="boolean", options={"default":true})
     */
    private ?bool $state = true;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $subscribeAt;

    /**
     * @ORM\OneToOne(targetEntity=UserAvatar::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private ?UserAvatar $userAvatar;

    /**
     * @ORM\OneToOne(targetEntity=Activity::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $activity;

    /**
     * @ORM\OneToMany(targetEntity=Ads::class, mappedBy="user", orphanRemoval=true)
     */
    private $ads;

    /**
     * @ORM\OneToMany(targetEntity=Teacher::class, mappedBy="user", orphanRemoval=true)
     */
    private $my_courses;

    /**
     * @ORM\OneToMany(targetEntity=JobOffer::class, mappedBy="user", orphanRemoval=true)
     */
    private $jobOffers;

    /**
     * @ORM\OneToMany(targetEntity=ParkAuto::class, mappedBy="user", orphanRemoval=true)
     */
    private $parkAutos;

    /**
     * @ORM\OneToMany(targetEntity=Ride::class, mappedBy="user", orphanRemoval=true, cascade={"persist"})
     */
    private $rides;

    /**
     * @ORM\OneToOne(targetEntity=TaxiDriver::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $taxiDriver;


    /**
     * @ORM\OneToMany(targetEntity=HouseVilla::class, mappedBy="user", orphanRemoval=true)
     */
    private $houseVillas;


    /**
     * @ORM\OneToMany(targetEntity=OfficeShopLand::class, mappedBy="user", orphanRemoval=true)
     */
    private $officeShopLands;

    /**
     * @ORM\OneToMany(targetEntity=Apartment::class, mappedBy="user", orphanRemoval=true)
     */
    private $apartments;

    /**
     * @ORM\OneToMany(targetEntity=Studio::class, mappedBy="user", orphanRemoval=true)
     */
    private $studios;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $google_id;


    /**
     * @ORM\ManyToMany(targetEntity=JobApply::class, mappedBy="users")
     */
    private $jobApplies;

    public function __construct()
    {
        $this->ads = new ArrayCollection();
        $this->my_courses = new ArrayCollection();
        $this->jobOffers = new ArrayCollection();
        $this->parkAutos = new ArrayCollection();
        $this->rides = new ArrayCollection();
        $this->houseVillas = new ArrayCollection();
        $this->officeShopLands = new ArrayCollection();
        $this->apartments = new ArrayCollection();
        $this->studios = new ArrayCollection();
        $this->jobApplies = new ArrayCollection();
    }

    public function getSlug():string{
        return (new Slugify())->slugify($this->username);
    }
    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getSexe(): ?int
    {
        return $this->sexe;
    }

    public function setSexe(int $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
    public function __toString():string{
        return $this->username;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getSubscribeAt(): ?\DateTimeInterface
    {
        return $this->subscribeAt;
    }

    public function setSubscribeAt(\DateTimeInterface $subscribeAt): self
    {
        $this->subscribeAt = $subscribeAt;

        return $this;
    }

    public function getUserAvatar(): ?UserAvatar
    {
        return $this->userAvatar;
    }

    public function setUserAvatar(UserAvatar $userAvatar): self
    {
        // set the owning side of the relation if necessary
        if ($userAvatar->getUser() !== $this) {
            $userAvatar->setUser($this);
        }

        $this->userAvatar = $userAvatar;

        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(Activity $activity): self
    {
        // set the owning side of the relation if necessary
        if ($activity->getUser() !== $this) {
            $activity->setUser($this);
        }

        $this->activity = $activity;

        return $this;
    }

    /**
     * @return Collection|Ads[]
     */
    public function getAds(): Collection
    {
        return $this->ads;
    }

    public function addAd(Ads $ad): self
    {
        if (!$this->ads->contains($ad)) {
            $this->ads[] = $ad;
            $ad->setUser($this);
        }

        return $this;
    }

    public function removeAd(Ads $ad): self
    {
        if ($this->ads->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getUser() === $this) {
                $ad->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Teacher[]
     */
    public function getMyCourses(): Collection
    {
        return $this->my_courses;
    }

    public function addMyCourse(Teacher $myCourse): self
    {
        if (!$this->my_courses->contains($myCourse)) {
            $this->my_courses[] = $myCourse;
            $myCourse->setUser($this);
        }

        return $this;
    }

    public function removeMyCourse(Teacher $myCourse): self
    {
        if ($this->my_courses->removeElement($myCourse)) {
            // set the owning side to null (unless already changed)
            if ($myCourse->getUser() === $this) {
                $myCourse->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JobOffer[]
     */
    public function getJobOffers(): Collection
    {
        return $this->jobOffers;
    }

    public function addJobOffer(JobOffer $jobOffer): self
    {
        if (!$this->jobOffers->contains($jobOffer)) {
            $this->jobOffers[] = $jobOffer;
            $jobOffer->setUser($this);
        }

        return $this;
    }

    public function removeJobOffer(JobOffer $jobOffer): self
    {
        if ($this->jobOffers->removeElement($jobOffer)) {
            // set the owning side to null (unless already changed)
            if ($jobOffer->getUser() === $this) {
                $jobOffer->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ParkAuto[]
     */
    public function getParkAutos(): Collection
    {
        return $this->parkAutos;
    }

    public function addParkAuto(ParkAuto $parkAuto): self
    {
        if (!$this->parkAutos->contains($parkAuto)) {
            $this->parkAutos[] = $parkAuto;
            $parkAuto->setUser($this);
        }

        return $this;
    }

    public function removeParkAuto(ParkAuto $parkAuto): self
    {
        if ($this->parkAutos->removeElement($parkAuto)) {
            // set the owning side to null (unless already changed)
            if ($parkAuto->getUser() === $this) {
                $parkAuto->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ride[]
     */
    public function getRides(): Collection
    {
        return $this->rides;
    }

    public function addRide(Ride $ride): self
    {
        if (!$this->rides->contains($ride)) {
            $this->rides[] = $ride;
            $ride->setUser($this);
        }

        return $this;
    }

    public function removeRide(Ride $ride): self
    {
        if ($this->rides->removeElement($ride)) {
            // set the owning side to null (unless already changed)
            if ($ride->getUser() === $this) {
                $ride->setUser(null);
            }
        }

        return $this;
    }

    public function getTaxiDriver(): ?TaxiDriver
    {
        return $this->taxiDriver;
    }

    public function setTaxiDriver(TaxiDriver $taxiDriver): self
    {
        // set the owning side of the relation if necessary
        if ($taxiDriver->getUser() !== $this) {
            $taxiDriver->setUser($this);
        }

        $this->taxiDriver = $taxiDriver;

        return $this;
    }


    /**
     * @return Collection|HouseVilla[]
     */
    public function getHouseVillas(): Collection
    {
        return $this->houseVillas;
    }

    public function addHouseVilla(HouseVilla $houseVilla): self
    {
        if (!$this->houseVillas->contains($houseVilla)) {
            $this->houseVillas[] = $houseVilla;
            $houseVilla->setUser($this);
        }

        return $this;
    }

    public function removeHouseVilla(HouseVilla $houseVilla): self
    {
        if ($this->houseVillas->removeElement($houseVilla)) {
            // set the owning side to null (unless already changed)
            if ($houseVilla->getUser() === $this) {
                $houseVilla->setUser(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|OfficeShopLand[]
     */
    public function getOfficeShopLands(): Collection
    {
        return $this->officeShopLands;
    }

    public function addOfficeShopLand(OfficeShopLand $officeShopLand): self
    {
        if (!$this->officeShopLands->contains($officeShopLand)) {
            $this->officeShopLands[] = $officeShopLand;
            $officeShopLand->setUser($this);
        }

        return $this;
    }

    public function removeOfficeShopLand(OfficeShopLand $officeShopLand): self
    {
        if ($this->officeShopLands->removeElement($officeShopLand)) {
            // set the owning side to null (unless already changed)
            if ($officeShopLand->getUser() === $this) {
                $officeShopLand->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Apartment[]
     */
    public function getApartments(): Collection
    {
        return $this->apartments;
    }

    public function addApartment(Apartment $apartment): self
    {
        if (!$this->apartments->contains($apartment)) {
            $this->apartments[] = $apartment;
            $apartment->setUser($this);
        }

        return $this;
    }

    public function removeApartment(Apartment $apartment): self
    {
        if ($this->apartments->removeElement($apartment)) {
            // set the owning side to null (unless already changed)
            if ($apartment->getUser() === $this) {
                $apartment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Studio[]
     */
    public function getStudios(): Collection
    {
        return $this->studios;
    }

    public function addStudio(Studio $studio): self
    {
        if (!$this->studios->contains($studio)) {
            $this->studios[] = $studio;
            $studio->setUser($this);
        }

        return $this;
    }

    public function removeStudio(Studio $studio): self
    {
        if ($this->studios->removeElement($studio)) {
            // set the owning side to null (unless already changed)
            if ($studio->getUser() === $this) {
                $studio->setUser(null);
            }
        }

        return $this;
    }

    public function getFacebookId(): ?int
    {
        return $this->facebook_id;
    }

    public function setFacebookId(?int $facebook_id): self
    {
        $this->facebook_id = $facebook_id;

        return $this;
    }

    public function getGoogleId(): ?string
    {
        return $this->google_id;
    }

    public function setGoogleId(?string $google_id): self
    {
        $this->google_id = $google_id;

        return $this;
    }


    /**
     * @return Collection|JobApply[]
     */
    public function getJobApplies(): Collection
    {
        return $this->jobApplies;
    }

    public function addJobApply(JobApply $jobApply): self
    {
        if (!$this->jobApplies->contains($jobApply)) {
            $this->jobApplies[] = $jobApply;
            $jobApply->addUser($this);
        }

        return $this;
    }

    public function removeJobApply(JobApply $jobApply): self
    {
        if ($this->jobApplies->removeElement($jobApply)) {
            $jobApply->removeUser($this);
        }

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->getEmail();
    }
}
