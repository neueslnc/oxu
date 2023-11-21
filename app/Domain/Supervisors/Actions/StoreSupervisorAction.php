<?php

namespace App\Domain\Supervisors\Actions;

use App\Domain\Supervisors\DTO\StoreSupervisorDTO;
use App\Domain\Supervisors\Models\Supervisor;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreSupervisorAction
{
    /**
     * @param StoreSupervisorDTO $dto
     * @return Supervisor
     * @throws Exception
     */
    public function execute(StoreSupervisorDTO $dto): Supervisor
    {
        DB::beginTransaction();
        try {
            $supervisor = new Supervisor();
            $supervisor->user_id = $dto->getUserId();
            $supervisor->semester_id = $dto->getSemesterId();
            $supervisor->direction_id = $dto->getDirectionId();
            $supervisor->science_id = $dto->getScienceId();
            $supervisor->subject_id = $dto->getSubjectId();
            $supervisor->date = $dto->getDate();
            $supervisor->status = $dto->getStatus();
            $supervisor->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $supervisor;
    }
}
