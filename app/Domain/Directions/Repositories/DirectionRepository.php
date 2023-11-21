<?php
namespace App\Domain\Directions\Repositories;

use App\Domain\Directions\Models\Direction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class DirectionRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function getPaginate($type_id): LengthAwarePaginator
    {
        return Direction::query()
            ->where('form_of_education_id','=', $type_id)
            ->orderBy('id','desc')
            ->paginate();
    }

    public function getType($type_id)
    {
        return Direction::query()
            ->where('type_of_education_id','=', $type_id)
            ->orderBy('id','desc')
            ->paginate();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll(): Collection|array
    {
        return Direction::query()
            ->orderBy('id','desc')
            ->get();
    }
}
