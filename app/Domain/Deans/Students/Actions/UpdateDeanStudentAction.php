<?php

namespace App\Domain\Deans\Students\Actions;


use App\Domain\Deans\Students\DTO\UpdateDeanStudentDTO;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UpdateDeanStudentAction
{
    /**
     * @param UpdateDeanStudentDTO $dto
     * @return User
     * @throws Exception
     */
    public function execute(UpdateDeanStudentDTO $dto)
    {
        DB::beginTransaction();
        try {
            $student = $dto->getUser();
            $student->sex_id = $dto->getSexId();
            $student->hemis_id = $dto->getHemisId() ? $dto->getHemisId() : $dto->getUser()->hemis_id;
            $student->full_name = $dto->getFullName();
            $student->number_phone = $dto->getNumberPhone() ? $dto->getNumberPhone() : $dto->getUser()->number_phone;
            $student->language_id = $dto->getLanguageId();
            $student->type_of_education_id = $dto->getTypeOfEducationId();
            $student->form_of_education_id = $dto->getFormOfEducationId();
            $student->direction_id = $dto->getDirectionId();
            $student->student_course_id = $dto->getStudentCourseId();
            $student->group_id = $dto->getGroupId();
            $student->contract_price = request()->contract_price;
            $student->passport_series = $dto->getPassportSeries() ? $dto->getPassportSeries() : $dto->getUser()->passport_series;
            $student->passport_pinfl = $dto->getPassportPinfl() ? $dto->getPassportPinfl() : $dto->getUser()->passport_pinfl;

            $student->student_id = $dto->getStudentId() ? $dto->getStudentId() : $dto->getUser()->student_id;
            $student->sex_id = $dto->getSexId() ? $dto->getSexId() : $dto->getUser()->sex_id;
            $student->birthday = $dto->getBirthday() ? $dto->getBirthday() : $dto->getUser()->birthday;
            $student->father_fio = $dto->getFatherFio() ? $dto->getFatherFio() : $dto->getUser()->father_fio;
            $student->father_phone = $dto->getFatherPhone() ? $dto->getFatherPhone() : $dto->getUser()->father_fio;
            $student->mather_fio = $dto->getMatherFio() ? $dto->getMatherFio() : $dto->getUser()->mather_fio;
            $student->mather_phone = $dto->getMatherPhone() ? $dto->getMatherPhone() : $dto->getUser()->mather_phone;
            $student->address = $dto->getAddress() ? $dto->getAddress() : $dto->getUser()->address;
            $student->address_temporarily = $dto->getAddressTemporarily() ? $dto->getAddressTemporarily() : $dto->getUser()->address_temporarily;
            $student->deprived_of_parental = $dto->getDeprivedOfParental() ? $dto->getDeprivedOfParental() : $dto->getUser()->deprived_of_parental;
            $student->disabled = $dto->getDisabled() ? $dto->getDisabled() : $dto->getUser()->disabled;
            $student->social_security = $dto->getSocialSecurity() ? $dto->getSocialSecurity() : $dto->getUser()->social_security;
            $student->court = $dto->getCourt() ? $dto->getCourt() : $dto->getUser()->court;
            $student->workplace = $dto->getWorkplace() ? $dto->getWorkplace() : $dto->getUser()->workplace;

            if ($dto->getFile()) {
                File::delete('students/images/' . $dto->getUser()->img_path);
                $file = $dto->getFile();
                $extension = $file->getClientOriginalExtension();
                $filename = time() . Str::random(4) . '.' . $extension;
                // File upload location
                $location = 'students/images/';
                // Upload file
                $file->move($location, $filename);
                // File path
                $student->img_path = $filename;
            }
            $student->update();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $student;
    }
}
