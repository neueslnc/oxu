<?php

namespace App\Domain\FormOfEducations\DTO;

class StoreFormOfEducationDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @param array $data
     * @return StoreFormOfEducationDTO
     */
    public static function fromArray(array $data): StoreFormOfEducationDTO
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
