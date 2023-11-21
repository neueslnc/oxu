<?php

namespace App\Domain\Deans\Groups\Actions;

use App\Domain\Deans\Groups\DTO\StoreDeanGroupDTO;
use App\Domain\Deans\Groups\DTO\UpdateDeanGroupDTO;
use App\Domain\Deans\Groups\Models\DeanGroup;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateDeanGroupAction
{
    /**
     * @param UpdateDeanGroupDTO $dto
     * @return DeanGroup
     * @throws Exception
     */
    public function execute(UpdateDeanGroupDTO $dto): DeanGroup
    {
        DB::beginTransaction();
        try {
            $group = $dto->getGroup();
            $group->title = $dto->getTitle();
            $group->update();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $group;
    }
}
