<?php

namespace App\Domain\FormOfEducations\Actions;

use App\Domain\FormOfEducations\DTO\StoreFormOfEducationDTO;
use App\Domain\FormOfEducations\DTO\UpdateFormOfEducationDTO;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateFormOfEducationAction
{
    /**
     * @param UpdateFormOfEducationDTO $dto
     * @return FormOfEducation
     * @throws Exception
     */
    public function execute(UpdateFormOfEducationDTO $dto): FormOfEducation
    {
        DB::beginTransaction();
        try {
            $form_education = $dto->getFormOfEducation();
            $form_education->title = $dto->getTitle();
            $form_education->update();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $form_education;
    }
}
