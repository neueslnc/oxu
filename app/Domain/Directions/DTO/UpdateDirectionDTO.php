<?php
namespace App\Domain\Directions\DTO;
use App\Domain\Directions\Models\Direction;

class UpdateDirectionDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var Direction
     */
    private Direction $direction;

    /**
     * @param array $data
     * @return UpdateDirectionDTO
     */
    public static function fromArray(array $data): UpdateDirectionDTO
    {
        $dto = new self();
        $dto->setTitle($data['title']);
        $dto->setDirection($data['direction']);

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
     * @return Direction
     */
    public function getDirection(): Direction
    {
        return $this->direction;
    }

    /**
     * @param Direction $direction
     */
    public function setDirection(Direction $direction): void
    {
        $this->direction = $direction;
    }
}
