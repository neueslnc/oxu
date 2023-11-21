<?php

namespace App\Domain\Deans\Groups\DTO;

use App\Domain\Deans\Groups\Models\DeanGroup;

class UpdateDeanGroupDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var DeanGroup
     */
    private DeanGroup $group;

    /**
     * @param array $data
     * @return UpdateDeanGroupDTO
     */
    public static function fromArray(array $data): UpdateDeanGroupDTO
    {
        $dto = new self();
        $dto->setTitle($data['title']);
        $dto->setGroup($data['group']);
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
     * @return DeanGroup
     */
    public function getGroup(): DeanGroup
    {
        return $this->group;
    }

    /**
     * @param DeanGroup $group
     */
    public function setGroup(DeanGroup $group): void
    {
        $this->group = $group;
    }
}
