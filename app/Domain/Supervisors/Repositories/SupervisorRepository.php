<?php

namespace App\Domain\Supervisors\Repositories;

use App\Domain\Supervisors\Models\Supervisor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SupervisorRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function getPaginate(): LengthAwarePaginator
    {
        return Supervisor::query()
            ->with(['user','semester','direction','science','subject'])
            ->orderBy('id','desc')
            ->paginate();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll(): Collection|array
    {
        return Supervisor::query()
            ->with(['user','semester','direction','science','subject'])
            ->orderBy('id','desc')
            ->get();
    }
}
