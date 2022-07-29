<?php


namespace App\Entity;


class TeacherSearch
{
    private string $course_name;
    private string $city;

    /**
     * @return string
     */
    public function getCourseName(): string
    {
        return $this->course_name;
    }

    /**
     * @param string $course_name
     * @return TeacherSearch
     */
    public function setCourseName(string $course_name): TeacherSearch
    {
        $this->course_name = $course_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return TeacherSearch
     */
    public function setCity(string $city): TeacherSearch
    {
        $this->city = $city;
        return $this;
    }
}