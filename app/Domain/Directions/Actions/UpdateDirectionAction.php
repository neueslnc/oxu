<?php
namespace App\Domain\Directions\Actions;
use App\Domain\Directions\DTO\UpdateDirectionDTO;
use App\Domain\Directions\Models\Direction;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateDirectionAction
{
    /**
     * @param UpdateDirectionDTO $dto
     * @return Direction
     * @throws Exception
     */
    public function execute(UpdateDirectionDTO $dto): Direction
    {
        DB::beginTransaction();
        try {
            $direction = $dto->getDirection();
            $direction->title = $dto->getTitle();
            $direction->update();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $direction;
    }
}
