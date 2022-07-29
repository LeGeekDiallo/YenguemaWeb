<?php


namespace App\Entity;


class EmailToAdmin
{
    private string $userName;
    private string $userEmail;
    private string $subject;
    private string $message;

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return EmailToAdmin
     */
    public function setUserName(string $userName): EmailToAdmin
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     * @return EmailToAdmin
     */
    public function setUserEmail(string $userEmail): EmailToAdmin
    {
        $this->userEmail = $userEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return EmailToAdmin
     */
    public function setSubject(string $subject): EmailToAdmin
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return EmailToAdmin
     */
    public function setMessage(string $message): EmailToAdmin
    {
        $this->message = $message;
        return $this;
    }


}