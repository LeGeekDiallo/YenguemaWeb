<?php

namespace App\Entity;

use App\Repository\JobOfferRepository;
use App\Tools\EntityInfos;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=JobOfferRepository::class)
 * @ORM\Table (name="job_offer", indexes={@ORM\Index(columns={"job_title", "category", "employer_profile", "required_skills", "employer_mission", "other_details"}, flags={"fulltext"})})
 */
class JobOffer implements EntityInfos
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
    private $compagny_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $job_title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contract_type;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $employer_gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filename;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\Regex(
     *     pattern="/^[6][2-9][0-9][0-9]{2}[0-9]{2}[0-9]{2}$/",
     *     match=true,
     *     message="Le numero de Tel doit contenir que des nombres et doit être de la forme 6xxxxxxxx"
     * )
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/[1-9][0-9]{5,}/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     */
    private $salary_estimate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $municipality;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $employer_profile;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $required_skills;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $employer_mission;

    /**
     * @ORM\Column(type="text")
     */
    private $other_details;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jobOffers")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=JobApply::class, mappedBy="job", orphanRemoval=true)
     */
    private $jobApplies;

    public function __construct()
    {
        $this->jobApplies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompagnyName(): ?string
    {
        return $this->compagny_name;
    }

    public function setCompagnyName(string $compagny_name): self
    {
        $this->compagny_name = $compagny_name;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->job_title;
    }

    public function setJobTitle(string $job_title): self
    {
        $this->job_title = $job_title;

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

    public function getContractType(): ?string
    {
        return $this->contract_type;
    }

    public function setContractType(string $contract_type): self
    {
        $this->contract_type = $contract_type;

        return $this;
    }

    public function getEmployerGender(): ?string
    {
        return $this->employer_gender;
    }

    public function setEmployerGender(string $employer_gender): self
    {
        $this->employer_gender = $employer_gender;

        return $this;
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

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSalaryEstimate(): ?string
    {
        return $this->salary_estimate;
    }

    public function setSalaryEstimate(string $salary_estimate): self
    {
        $this->salary_estimate = $salary_estimate;

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

    public function getEmployerProfile(): ?string
    {
        return $this->employer_profile;
    }

    public function setEmployerProfile(string $employer_profile): self
    {
        $this->employer_profile = $employer_profile;

        return $this;
    }

    public function getRequiredSkills(): ?string
    {
        return $this->required_skills;
    }

    public function setRequiredSkills(string $required_skills): self
    {
        $this->required_skills = $required_skills;

        return $this;
    }

    public function getEmployerMission(): ?string
    {
        return $this->employer_mission;
    }

    public function setEmployerMission(string $employer_mission): self
    {
        $this->employer_mission = $employer_mission;

        return $this;
    }

    public function getOtherDetails(): ?string
    {
        return $this->other_details;
    }

    public function setOtherDetails(string $other_details): self
    {
        $this->other_details = $other_details;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSlug():string{
        return (new Slugify())->slugify($this->job_title);
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
            $jobApply->setJob($this);
        }

        return $this;
    }

    public function removeJobApply(JobApply $jobApply): self
    {
        if ($this->jobApplies->removeElement($jobApply)) {
            // set the owning side to null (unless already changed)
            if ($jobApply->getJob() === $this) {
                $jobApply->setJob(null);
            }
        }

        return $this;
    }

    public function getInfos(): array
    {
        $infos = [];
        foreach ($this as $item=>$value){
            if($item != "user" and $item != "jobApplies") {
                $infos[$item] = $value;
            }
        }
        $candidates = [];
        foreach ($this->getJobApplies() as $canditate){
            $candidates[] = $canditate->getInfos();
        }
        $infos["applications"] = $candidates;
        $infos["resumeURL"] = "https://leyenguema.com/resume/";
        return $infos;
    }

    public function getJob():array{
        $job = [];
        foreach ($this as $item=>$value){
            if($item != "user" and $item != "jobApplies") {
                $job[$item] = $value;
            }
        }
        return $job;
    }
}
