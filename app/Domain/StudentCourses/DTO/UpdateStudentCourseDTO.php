<?php

namespace App\Domain\StudentCourses\DTO;

use App\Domain\StudentCourses\Models\StudentCourse;

class UpdateStudentCourseDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var StudentCourse
     */
    private StudentCourse $student_course;

    /**
     * @param array $data
     * @return UpdateStudentCourseDTO
     */
    public static function fromArray(array $data): UpdateStudentCourseDTO
    {
        $dto = new self();
        $dto->setTitle($data['title']);
        $dto->setStudentCourse($data['student_course']);
        return $dto;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return StudentCourse
     */
    public function getStudentCourse(): StudentCourse
    {
        return $this->student_course;
    }

    /**
     * @param StudentCourse $student_course
     */
    public function setStudentCourse(StudentCourse $student_course): void
    {
        $this->student_course = $student_course;
    }
}
