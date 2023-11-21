<?php

namespace App\Domain\FormOfEducations\Actions;

use App\Domain\FormOfEducations\DTO\StoreFormOfEducationDTO;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreFormOfEducationAction
{
    /**
     * @param StoreFormOfEducationDTO $dto
     * @return FormOfEducation
     * @throws Exception
     */
    public function execute(StoreFormOfEducationDTO $dto): FormOfEducation
    {
        DB::beginTransaction();
        try {
            $form_education = new FormOfEducation();
            $form_education->title = $dto->getTitle();
            $form_education->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $form_education;
    }
}
