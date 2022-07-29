<?php

namespace App\Entity;

use App\Repository\ExamSubjectRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ExamSubjectRepository::class)
 */
class ExamSubject
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
    private $course_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $the_mention;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=4)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="/(1|2)[0-9]{3}/",
     *     match=true,
     *     message="Valeur non autorisée"
     * )
     */
    private $exam_year;

    /**
     * @return mixed
     */
    public function getExamYear()
    {
        return $this->exam_year;
    }

    /**
     * @param mixed $exam_year
     * @return ExamSubject
     */
    public function setExamYear($exam_year)
    {
        $this->exam_year = $exam_year;
        return $this;
    }

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $school_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourseName(): ?string
    {
        return $this->course_name;
    }

    public function setCourseName(string $course_name): self
    {
        $this->course_name = $course_name;

        return $this;
    }

    public function getTheMention(): ?string
    {
        return $this->the_mention;
    }

    public function setTheMention(string $the_mention): self
    {
        $this->the_mention = $the_mention;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }



    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getSchoolName(): ?string
    {
        return $this->school_name;
    }

    public function setSchoolName(string $school_name): self
    {
        $this->school_name = $school_name;

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

    public function getSlug():string{
        return (new Slugify())->slugify($this->course_name.$this->id.$this->description);
    }
}
