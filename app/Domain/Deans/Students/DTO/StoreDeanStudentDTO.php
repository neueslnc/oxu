<?php

namespace App\Domain\Deans\Students\DTO;

class StoreDeanStudentDTO
{
    /**
     * @var int
     */
    private int $student_id;

    /**
     * @var int|null
     */
    private ?int $hemis_id = null;

    /**
     * @var int|null
     */
    private ?int $sex_id = null;

    /**
     * @var string
     */
    private string $full_name;

    /**
     * @var string
     */
    private string $number_phone;

    /**
     * @var int
     * ta'lim tili
     */
    private int $language_id;

    /**
     * @var int
     */
    private int $group_id;

    /**
     * @var int
     * ta'lim shakli
     */
    private int $type_of_education_id;

    /**
     * @var int
     * ta'lim yo'nalishi
     */
    private int $direction_id;

    /**
     * @var int
     * ta'lim kursi
     */
    private int $student_course_id;

    /**
     * @var int
     * ta'lim turi
     */
    private int $form_of_education_id;

    /**
     * @var string|null
     */
    private ?string $passport_series = null;

    /**
     * @var int|null
     */
    private ?int $passport_pinfl = null;

    /**
     * @param array $data
     * @return StoreDeanStudentDTO
     */
    public static function fromArray(array $data): StoreDeanStudentDTO
    {
        $dto = new self();
        $dto->setStudentId($data['student_id']);
        $dto->setFullName($data['full_name']);
        $dto->setNumberPhone($data['number_phone']);
        $dto->setLanguageId($data['language_id']);
        $dto->setTypeOfEducationId($data['type_of_education_id']);
        $dto->setDirectionId($data['direction_id']);
        $dto->setStudentCourseId($data['student_course_id']);
        $dto->setFormOfEducationId($data['form_of_education_id']);
        $dto->setGroupId($data['group_id']);
        $dto->setPassportSeries($data['passport_series'] ?? null);
        $dto->setPassportPinfl($data['passport_pinfl'] ?? null);
        $dto->setHemisId($data['hemis_id'] ?? null);
        $dto->setSexId($data['sex_id'] ?? null);

        return $dto;
    }

    /**
     * @return int|null
     */
    public function getHemisId(): ?int
    {
        return $this->hemis_id;
    }

    /**
     * @param int|null $hemis_id
     */
    public function setHemisId(?int $hemis_id): void
    {
        $this->hemis_id = $hemis_id;
    }

    /**
     * @return int|null
     */
    public function getSexId(): ?int
    {
        return $this->sex_id;
    }

    /**
     * @param int|null $sex_id
     */
    public function setSexId(?int $sex_id): void
    {
        $this->sex_id = $sex_id;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->group_id;
    }

    /**
     * @param int $group_id
     */
    public function setGroupId(int $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return int
     */
    public function getStudentId(): int
    {
        return $this->student_id;
    }

    /**
     * @param int $student_id
     */
    public function setStudentId(int $student_id): void
    {
        $this->student_id = $student_id;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName(string $full_name): void
    {
        $this->full_name = $full_name;
    }

    /**
     * @return string
     */
    public function getNumberPhone(): string
    {
        return $this->number_phone;
    }

    /**
     * @param string $number_phone
     */
    public function setNumberPhone(string $number_phone): void
    {
        $this->number_phone = $number_phone;
    }

    /**
     * @return int
     */
    public function getLanguageId(): int
    {
        return $this->language_id;
    }

    /**
     * @param int $language_id
     */
    public function setLanguageId(int $language_id): void
    {
        $this->language_id = $language_id;
    }

    /**
     * @return int
     */
    public function getTypeOfEducationId(): int
    {
        return $this->type_of_education_id;
    }

    /**
     * @param int $type_of_education_id
     */
    public function setTypeOfEducationId(int $type_of_education_id): void
    {
        $this->type_of_education_id = $type_of_education_id;
    }

    /**
     * @return int
     */
    public function getDirectionId(): int
    {
        return $this->direction_id;
    }

    /**
     * @param int $direction_id
     */
    public function setDirectionId(int $direction_id): void
    {
        $this->direction_id = $direction_id;
    }

    /**
     * @return int
     */
    public function getStudentCourseId(): int
    {
        return $this->student_course_id;
    }

    /**
     * @param int $student_course_id
     */
    public function setStudentCourseId(int $student_course_id): void
    {
        $this->student_course_id = $student_course_id;
    }

    /**
     * @return int
     */
    public function getFormOfEducationId(): int
    {
        return $this->form_of_education_id;
    }

    /**
     * @param int $form_of_education_id
     */
    public function setFormOfEducationId(int $form_of_education_id): void
    {
        $this->form_of_education_id = $form_of_education_id;
    }

    /**
     * @return string|null
     */
    public function getPassportSeries(): ?string
    {
        return $this->passport_series;
    }

    /**
     * @param string|null $passport_series
     */
    public function setPassportSeries(?string $passport_series): void
    {
        $this->passport_series = $passport_series;
    }

    /**
     * @return int|null
     */
    public function getPassportPinfl(): ?int
    {
        return $this->passport_pinfl;
    }

    /**
     * @param int|null $passport_pinfl
     */
    public function setPassportPinfl(?int $passport_pinfl): void
    {
        $this->passport_pinfl = $passport_pinfl;
    }
}
