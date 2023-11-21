<?php
namespace App\Domain\FormOfEducations\Repositories;

use App\Domain\FormOfEducations\Models\FormOfEducation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FormOfEducationRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function getPaginate(): LengthAwarePaginator
    {
        return FormOfEducation::query()
            ->orderBy('id','desc')
            ->paginate();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        return FormOfEducation::query()
            ->orderBy('id','desc')
            ->get();
    }
}
