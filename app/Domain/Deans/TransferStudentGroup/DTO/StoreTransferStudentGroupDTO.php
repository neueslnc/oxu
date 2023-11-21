<?php

namespace App\Domain\Deans\TransferStudentGroup\DTO;

use Illuminate\Http\UploadedFile;

class StoreTransferStudentGroupDTO
{
    /**
     * @var int
     */
    private int $student_id;

    /**
     * @var int|null
     */
    private ?int $exit_direction_id = null;

    /**
     * @var int|null
     */
    private ?int $transfer_direction_id = null;

    /**
     * @var int|null
     */
    private ?int $exit_group_id = null;

    /**
     * @var int|null
     */
    private ?int $transfer_group_id = null;

    /**
     * @var string|null
     */
    private ?string $date = null;

    /**
     * @var string|null
     */
    private ?string $desc = null;

    /**
     * @var string|null
     */
    private ?string $academic_year = null;

    /**
     * @var UploadedFile|null
     */
    private ?UploadedFile $file = null;

    /**
     * @param array $data
     * @return StoreTransferStudentGroupDTO
     */
    public static function fromArray(array $data): StoreTransferStudentGroupDTO
    {
        $dto = new self();
        $dto->setStudentId($data['student_id']);
        $dto->setExitDirectionId($data['exit_direction_id'] ?? null);
        $dto->setTransferDirectionId($data['transfer_direction_id'] ?? null);
        $dto->setExitGroupId($data['exit_group_id'] ?? null);
        $dto->setTransferGroupId($data['transfer_group_id'] ?? null);
        $dto->setDate($data['date'] ?? null);
        $dto->setDesc($data['desc'] ?? null);
        $dto->setAcademicYear($data['academic_year'] ?? null);
        $dto->setFile($data['file'] ?? null);

        return $dto;
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
     * @return int|null
     */
    public function getExitDirectionId(): ?int
    {
        return $this->exit_direction_id;
    }

    /**
     * @param int|null $exit_direction_id
     */
    public function setExitDirectionId(?int $exit_direction_id): void
    {
        $this->exit_direction_id = $exit_direction_id;
    }

    /**
     * @return int|null
     */
    public function getTransferDirectionId(): ?int
    {
        return $this->transfer_direction_id;
    }

    /**
     * @param int|null $transfer_direction_id
     */
    public function setTransferDirectionId(?int $transfer_direction_id): void
    {
        $this->transfer_direction_id = $transfer_direction_id;
    }

    /**
     * @return int|null
     */
    public function getExitGroupId(): ?int
    {
        return $this->exit_group_id;
    }

    /**
     * @param int|null $exit_group_id
     */
    public function setExitGroupId(?int $exit_group_id): void
    {
        $this->exit_group_id = $exit_group_id;
    }

    /**
     * @return int|null
     */
    public function getTransferGroupId(): ?int
    {
        return $this->transfer_group_id;
    }

    /**
     * @param int|null $transfer_group_id
     */
    public function setTransferGroupId(?int $transfer_group_id): void
    {
        $this->transfer_group_id = $transfer_group_id;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getDesc(): ?string
    {
        return $this->desc;
    }

    /**
     * @param string|null $desc
     */
    public function setDesc(?string $desc): void
    {
        $this->desc = $desc;
    }

    /**
     * @return string|null
     */
    public function getAcademicYear(): ?string
    {
        return $this->academic_year;
    }

    /**
     * @param string|null $academic_year
     */
    public function setAcademicYear(?string $academic_year): void
    {
        $this->academic_year = $academic_year;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * @param UploadedFile|null $file
     */
    public function setFile(?UploadedFile $file): void
    {
        $this->file = $file;
    }
}
