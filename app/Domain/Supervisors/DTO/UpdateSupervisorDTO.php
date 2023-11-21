<?php

namespace App\Domain\Supervisors\DTO;

use App\Domain\Supervisors\Models\Supervisor;

class UpdateSupervisorDTO
{
    /**
     * @var int
     */
    private int $user_id;

    /**
     * @var int
     */
    private int $semester_id;

    /**
     * @var int
     */
    private int $direction_id;

    /**
     * @var int
     */
    private int $science_id;

    /**
     * @var int
     */
    private int $subject_id;

    /**
     * @var string
     */
    private string $date;

    /**
     * @var Supervisor
     */
    private Supervisor $supervisor;

    /**
     * @var int|null
     */
    private ?int $status = null;

    /**
     * @param array $data
     * @return UpdateSupervisorDTO
     */
    public static function fromArray(array $data): UpdateSupervisorDTO
    {
        $dto = new self();
        $dto->setUserId($data['user_id']);
        $dto->setSemesterId($data['semester_id']);
        $dto->setDirectionId($data['direction_id']);
        $dto->setScienceId($data['science_id']);
        $dto->setSubjectId($data['subject_id']);
        $dto->setDate($data['date']);
        $dto->setStatus($data['status'] ?? 1);
        $dto->setSupervisor($data['supervisor']);
        return $dto;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getSemesterId(): int
    {
        return $this->semester_id;
    }

    /**
     * @param int $semester_id
     */
    public function setSemesterId(int $semester_id): void
    {
        $this->semester_id = $semester_id;
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
    public function getScienceId(): int
    {
        return $this->science_id;
    }

    /**
     * @param int $science_id
     */
    public function setScienceId(int $science_id): void
    {
        $this->science_id = $science_id;
    }

    /**
     * @return int
     */
    public function getSubjectId(): int
    {
        return $this->subject_id;
    }

    /**
     * @param int $subject_id
     */
    public function setSubjectId(int $subject_id): void
    {
        $this->subject_id = $subject_id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     */
    public function setStatus(?int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Supervisor
     */
    public function getSupervisor(): Supervisor
    {
        return $this->supervisor;
    }

    /**
     * @param Supervisor $supervisor
     */
    public function setSupervisor(Supervisor $supervisor): void
    {
        $this->supervisor = $supervisor;
    }
}
