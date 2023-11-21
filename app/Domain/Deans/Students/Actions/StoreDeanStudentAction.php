<?php

namespace App\Domain\Deans\Students\Actions;

use App\Domain\Deans\Students\DTO\StoreDeanStudentDTO;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreDeanStudentAction
{
    /**
     * @param StoreDeanStudentDTO $dto
     * @return User
     * @throws Exception
     */
    public function execute(StoreDeanStudentDTO $dto): User
    {
        DB::beginTransaction();
        try {
            $student = new User();
            $student->student_id = $dto->getStudentId();
            $student->sex_id = $dto->getSexId();
            $student->hemis_id = $dto->getHemisId();
            $student->full_name = $dto->getFullName();
            $student->phone = $dto->getNumberPhone();
            $student->language_id = $dto->getLanguageId();
            $student->type_of_education_id = $dto->getTypeOfEducationId();
            $student->form_of_education_id = $dto->getFormOfEducationId();
            $student->direction_id = $dto->getDirectionId();
            $student->student_course_id = $dto->getStudentCourseId();
            $student->group_id = $dto->getGroupId();
            $student->passport_series = $dto->getPassportSeries();
            $student->passport_number = $dto->getPassportNumber();
            $student->passport_pinfl = $dto->getPassportPinfl();
            $student->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $student;
    }
}
