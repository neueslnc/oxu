<?php

namespace App\Domain\StudentCourses\Repositories;

use App\Domain\StudentCourses\Models\StudentCourse;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class StudentCourseRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function getPaginate(): LengthAwarePaginator
    {
        return StudentCourse::query()
            ->orderBy('id', 'desc')
            ->paginate();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        return StudentCourse::query()
            ->get();
    }
}
