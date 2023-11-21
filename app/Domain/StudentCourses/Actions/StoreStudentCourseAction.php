<?php

namespace App\Domain\StudentCourses\Actions;

use App\Domain\StudentCourses\DTO\StoreStudentCourseDTO;
use App\Domain\StudentCourses\Models\StudentCourse;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreStudentCourseAction
{
    /**
     * @param StoreStudentCourseDTO $dto
     * @return StudentCourse
     * @throws Exception
     */
    public function execute(StoreStudentCourseDTO $dto): StudentCourse
    {
        DB::beginTransaction();
        try {
            $student_course = new StudentCourse();
            $student_course->title = $dto->getTitle();
            $student_course->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $student_course;
    }
}
