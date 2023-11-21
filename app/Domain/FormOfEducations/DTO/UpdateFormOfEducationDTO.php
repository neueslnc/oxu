<?php

namespace App\Domain\FormOfEducations\DTO;

use App\Domain\FormOfEducations\Models\FormOfEducation;

class UpdateFormOfEducationDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var FormOfEducation
     */
    private FormOfEducation $form_of_education;

    /**
     * @param array $data
     * @return UpdateFormOfEducationDTO
     */
    public static function fromArray(array $data): UpdateFormOfEducationDTO
    {
        $dto = new self();
        $dto->setTitle($data['title']);
        $dto->setFormOfEducation($data['form_of_education']);

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
     * @return FormOfEducation
     */
    public function getFormOfEducation(): FormOfEducation
    {
        return $this->form_of_education;
    }

    /**
     * @param FormOfEducation $form_of_education
     */
    public function setFormOfEducation(FormOfEducation $form_of_education): void
    {
        $this->form_of_education = $form_of_education;
    }
}
