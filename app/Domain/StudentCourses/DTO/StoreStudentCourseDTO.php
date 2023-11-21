<?php

namespace App\Domain\StudentCourses\DTO;

class StoreStudentCourseDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @param array $data
     * @return StoreStudentCourseDTO
     */
    public static function fromArray(array $data): StoreStudentCourseDTO
    {
        $dto = new self();
        $dto->setTitle($data['title']);
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
}
