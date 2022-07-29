<?php


namespace App\Entity;


class ContactUs
{
    private string $username;
    private string $useremail;
    private string $userprofession;
    private string $message;


    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return ContactUs
     */
    public function setMessage(string $message): ContactUs
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return ContactUs
     */
    public function setUsername(string $username): ContactUs
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getUseremail(): string
    {
        return $this->useremail;
    }

    /**
     * @param string $useremail
     * @return ContactUs
     */
    public function setUseremail(string $useremail): ContactUs
    {
        $this->useremail = $useremail;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserprofession(): string
    {
        return $this->userprofession;
    }

    /**
     * @param string $userprofession
     * @return ContactUs
     */
    public function setUserprofession(string $userprofession): ContactUs
    {
        $this->userprofession = $userprofession;
        return $this;
    }


}