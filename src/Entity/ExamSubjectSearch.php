<?php


namespace App\Entity;


class ExamSubjectSearch
{
    private string $course_name;

    /**
     * @return string
     */
    public function getCourseName(): string
    {
        return $this->course_name;
    }

    /**
     * @param string $course_name
     * @return ExamSubjectSearch
     */
    public function setCourseName(string $course_name): ExamSubjectSearch
    {
        $this->course_name = $course_name;
        return $this;
    }

}