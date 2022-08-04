<?php

namespace App\Entity;

use App\Repository\JobApplyRepository;
use App\Tools\EntityInfos;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobApplyRepository::class)
 */
class JobApply implements EntityInfos
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
    private $candidate_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $candidate_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $candidate_phonenumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\ManyToOne(targetEntity=JobOffer::class, inversedBy="jobApplies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job;


    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $application_letter;


    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="jobApplies")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCandidateName(): ?string
    {
        return $this->candidate_name;
    }

    public function setCandidateName(string $candidate_name): self
    {
        $this->candidate_name = $candidate_name;

        return $this;
    }

    public function getCandidateEmail(): ?string
    {
        return $this->candidate_email;
    }

    public function setCandidateEmail(string $candidate_email): self
    {
        $this->candidate_email = $candidate_email;

        return $this;
    }

    public function getCandidatePhonenumber(): ?string
    {
        return $this->candidate_phonenumber;
    }

    public function setCandidatePhonenumber(string $candidate_phonenumber): self
    {
        $this->candidate_phonenumber = $candidate_phonenumber;

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

    public function getJob(): ?JobOffer
    {
        return $this->job;
    }

    public function setJob(?JobOffer $job): self
    {
        $this->job = $job;

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

    public function getApplicationLetter(): ?string
    {
        return $this->application_letter;
    }

    public function setApplicationLetter(?string $application_letter): self
    {
        $this->application_letter = $application_letter;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->users->removeElement($user);

        return $this;
    }

    public function getInfos(): array
    {
        $infos = [];
        foreach ($this as $item=>$value){
            if($item != "job" and $item != "users") {
                $infos[$item] = $value;
            }
        }
        return $infos;
    }
}
