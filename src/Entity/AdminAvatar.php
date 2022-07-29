<?php

namespace App\Entity;

use App\Repository\AdminAvatarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminAvatarRepository::class)
 */
class AdminAvatar
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
    private $filename;

    /**
     * @ORM\OneToOne(targetEntity=Admin::class, inversedBy="userAvatar", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userAvatar;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUserAvatar(): ?Admin
    {
        return $this->userAvatar;
    }

    public function setUserAvatar(Admin $userAvatar): self
    {
        $this->userAvatar = $userAvatar;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}
