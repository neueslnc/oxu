<?php

namespace App\Domain\Deans\Groups\Repositories;

use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DeanGroupRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function getPaginate($direction_id): LengthAwarePaginator
    {
        return DeanGroup::query()
            ->with(['get_group_course_id'])
            ->where('direction_id','=',$direction_id)
            ->orderBy('id')
            ->paginate();
    }

    public function get($direction_id,$type)
    {
        if ($type == 1) {
            return DeanGroup::query()
                ->with(['get_direction_id' => function($query){
                    $query->where('dean_id','=',Auth::user()->id);
                }])
                ->where('direction_id','=',$direction_id)
                ->get();
        } if ($type == 2) {
            return DeanGroup::query()
                ->with('get_direction_id')
                ->where('direction_id','=',$direction_id)
                ->get();
        } if ($type == 3) {
            return DeanGroup::query()
                ->with('get_direction_id')
                ->where('form_of_education_id', '=', 2)
                ->where('direction_id','=',$direction_id)
                ->get();
        }if ($type == 4) {
            return DeanGroup::query()
                ->with('get_direction_id')
                ->where('direction_id','=',$direction_id)
                ->get();
        }
    }

    /**
     * @param $type
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function getDirection($type)
    {
        return DeanGroup::query()
            ->with(['get_direction_id'])
            ->where('type_of_education_id','=',$type)
            ->get();
    }

    /**
     * @return array|Collection
     */
    public function getAll(): array|Collection
    {
        return DeanGroup::query()
            ->orderBy('id','desc')
            ->get();
    }
}
