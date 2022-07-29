<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TeacherRepository::class)
 */
class Teacher
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
     * @Assert\Length(min=20, minMessage="Saisir au minimum 20 caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/^[2-6][0-9]$/",
     *     match=true,
     *     message="Valeur non autorisée")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profile;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex(
     *     pattern="/\d+/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     */
    private $years_of_experience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $class_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $public;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $course;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/\d+/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $billing_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $municipality;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $some_details;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="my_courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="text")
     */
    private $teacher_diploma;

    /**
     * @ORM\Column(type="text")
     */
    private $teaching_methodology;

    /**
     * @ORM\Column(type="text")
     */
    private $teacher_background;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getYearsOfExperience(): ?int
    {
        return $this->years_of_experience;
    }

    public function setYearsOfExperience(int $years_of_experience): self
    {
        $this->years_of_experience = $years_of_experience;

        return $this;
    }

    public function getClassType(): ?string
    {
        return $this->class_type;
    }

    public function setClassType(string $class_type): self
    {
        $this->class_type = $class_type;

        return $this;
    }

    public function getPublic(): ?string
    {
        return $this->public;
    }

    public function setPublic(string $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getCourse(): ?string
    {
        return $this->course;
    }

    public function setCourse(string $course): self
    {
        $this->course = $course;

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

    public function getBillingType(): ?string
    {
        return $this->billing_type;
    }

    public function setBillingType(string $billing_type): self
    {
        $this->billing_type = $billing_type;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getSomeDetails(): ?string
    {
        return $this->some_details;
    }

    public function setSomeDetails(string $some_details): self
    {
        $this->some_details = $some_details;

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
        return (new Slugify())->slugify($this->course);
    }

    public function getTeacherDiploma(): ?string
    {
        return $this->teacher_diploma;
    }

    public function setTeacherDiploma(string $teacher_diploma): self
    {
        $this->teacher_diploma = $teacher_diploma;

        return $this;
    }

    public function getTeachingMethodology(): ?string
    {
        return $this->teaching_methodology;
    }

    public function setTeachingMethodology(string $teaching_methodology): self
    {
        $this->teaching_methodology = $teaching_methodology;

        return $this;
    }

    public function getTeacherBackground(): ?string
    {
        return $this->teacher_background;
    }

    public function setTeacherBackground(string $teacher_background): self
    {
        $this->teacher_background = $teacher_background;

        return $this;
    }
}
