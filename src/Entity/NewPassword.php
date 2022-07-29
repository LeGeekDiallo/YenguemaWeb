<?php


namespace App\Entity;


class NewPassword
{

    private string $email;
    private string $newPassword;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return NewPassword
     */
    public function setEmail(string $email): NewPassword
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewPassword(): string
    {
        return $this->newPassword;
    }

    /**
     * @param string $newPassword
     * @return NewPassword
     */
    public function setNewPassword(string $newPassword): NewPassword
    {
        $this->newPassword = $newPassword;
        return $this;
    }

}