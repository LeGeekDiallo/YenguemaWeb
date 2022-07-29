<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin implements UserInterface
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
     * @Assert\Length(min=10)
     * @Assert\Regex("/^[a-zA-z\s]+$/")
     */
    private $adminname;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\EqualTo(propertyPath="confirm_password")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password")
     * @var string
     */
    private string $confirm_password;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/^[6][2-9][0-9][0-9]{2}[0-9]{2}[0-9]{2}$/",
     *     match=true,
     *     message="Le numero de Tel doit contenir que des nombres"
     * )
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registerAt;

    /**
     * @ORM\OneToOne(targetEntity=AdminAvatar::class, mappedBy="userAvatar", cascade={"persist", "remove"})
     */
    private $userAvatar;

    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function getAdminname(): ?string
    {
        return $this->adminname;
    }

    public function setAdminname(string $adminname): self
    {
        $this->adminname = $adminname;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->adminname;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ADMIN';

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
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getRegisterAt(): ?\DateTimeInterface
    {
        return $this->registerAt;
    }

    public function setRegisterAt(\DateTimeInterface $registerAt): self
    {
        $this->registerAt = $registerAt;

        return $this;
    }

    public function __toString():string{
        return $this->adminname;
    }

    public function getUserAvatar(): ?AdminAvatar
    {
        return $this->userAvatar;
    }

    public function setUserAvatar(AdminAvatar $userAvatar): self
    {
        // set the owning side of the relation if necessary
        if ($userAvatar->getUserAvatar() !== $this) {
            $userAvatar->setUserAvatar($this);
        }

        $this->userAvatar = $userAvatar;

        return $this;
    }
}
