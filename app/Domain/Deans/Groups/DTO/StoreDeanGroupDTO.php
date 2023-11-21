<?php

namespace App\Domain\Deans\Groups\DTO;

class StoreDeanGroupDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @param array $data
     * @return StoreDeanGroupDTO
     */
    public static function fromArray(array $data): StoreDeanGroupDTO
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
