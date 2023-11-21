<?php
namespace App\Domain\Directions\DTO;

class StoreDirectionDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @param array $data
     * @return StoreDirectionDTO
     */
    public static function fromArray(array $data): StoreDirectionDTO
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
