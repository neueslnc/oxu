<?php
namespace App\Domain\Directions\Actions;
use App\Domain\Directions\DTO\StoreDirectionDTO;
use App\Domain\Directions\Models\Direction;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreDirectionAction
{
    /**
     * @param StoreDirectionDTO $dto
     * @return Direction
     * @throws Exception
     */
    public function execute(StoreDirectionDTO $dto): Direction
    {
        DB::beginTransaction();
        try {
            $direction = new Direction();
            $direction->title = $dto->getTitle();
            $direction->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $direction;
    }
}
