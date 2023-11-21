<?php

namespace App\Domain\Deans\Groups\Actions;

use App\Domain\Deans\Groups\DTO\StoreDeanGroupDTO;
use App\Domain\Deans\Groups\Models\DeanGroup;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreDeanGroupAction
{
    /**
     * @param StoreDeanGroupDTO $dto
     * @return DeanGroup
     * @throws Exception
     */
    public function execute(StoreDeanGroupDTO $dto): DeanGroup
    {
        DB::beginTransaction();
        try {
            $group = new DeanGroup();
            $group->title = $dto->getTitle();
            $group->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $group;
    }
}
