<?php

namespace App\Domain\Deans\Students\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DeanStudentRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function getPaginate(): LengthAwarePaginator
    {
        return User::query()
            ->with('direction','group','form_of_education','transfer')
            ->where('level_id','=',4)
            ->orderBy('id', 'desc')
            ->paginate(30);
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll(): Collection|array
    {
        return User::query()
            ->where('level_id','=',4)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param $student_id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function getStudent($student_id): Model|Collection|Builder|array|null
    {
        return User::query()
            ->with(['language', 'type_of_education', 'form_of_education', 'direction', 'student_course', 'dean_group'])
            ->where('level_id','=',4)
            ->orderBy('id', 'desc')
            ->find($student_id);
    }

    /**
     * @param $direction_id
     * @return Builder[]|Collection
     */
    public function getDirectionGroupPaginate($direction_id,$course,$type)
    {
        if ($type == 1){
            return User::query()
                ->with(['dean_group', 'direction'])
                ->where('direction_id', '=', $direction_id)
                ->where('old_course', '=', $course)
                ->groupBy('group_id')
                ->get();
        }
        if($type == 2){
            if($course == 1){
                return User::query()
                    ->with(['dean_group', 'direction'])
                    ->where('direction_id', '=', $direction_id)
                    ->where('old_course', '=', $course)
                    ->where('student_course_id', '=', null)
                    ->groupBy('group_id')
                    ->get();
            }elseif($course==2){
                return User::query()
                    ->with(['dean_group', 'direction'])
                    ->where('direction_id', '=', $direction_id)
                    ->where('student_course_id', '=', $course)
                    ->groupBy('group_id')
                    ->get();
            }elseif($course==3){
                return User::query()
                    ->with(['dean_group', 'direction'])
                    ->where('direction_id', '=', $direction_id)
                    ->where('student_course_id', '=', $course)
                    ->groupBy('group_id')
                    ->get();
            }
        }
        if($type == 3){
            if($course == 1){
                return User::query()
                    ->with(['dean_group', 'direction'])
                    ->where('direction_id', '=', $direction_id)
                    ->where('old_course', '=', $course)
                    ->where('student_course_id', '=', null)
                    ->groupBy('group_id')
                    ->get();
            }elseif($course == 2){
                return User::query()
                    ->with(['dean_group', 'direction'])
                    ->where('direction_id', '=', $direction_id)
                    ->where('student_course_id', '=', $course)
                    ->groupBy('group_id')
                    ->get();
            }
        }
        if($type == 4){
            return User::query()
                ->with(['dean_group', 'direction'])
                ->where('direction_id', '=', $direction_id)
                ->where('old_course', '=', $course)
                ->groupBy('group_id')
                ->get();
        }
    }

    /**
     * @param $direction_id
     * @return Builder[]|Collection
     */
    public function getDirectionGroupId($direction_id): array|Collection
    {
        return User::query()
            ->with('dean_group')
            ->where('direction_id', '=', $direction_id)
            ->groupBy('group_id')
            ->get();
    }

    /**
     * @param $direction_id
     * @param $group_id
     * @return Builder[]|Collection
     */
    public function getDirectionGroupStudentAll($direction_id, $group_id): Collection|array
    {
        return User::query()
            ->with(['language','type_of_education','form_of_education','student_course','transfer','dean_group','sex'])
            ->where('direction_id', '=', $direction_id)
            ->where('group_id', '=', $group_id)
            ->get();
    }

    /**
     * @param $direction_id
     * @param $group_id
     * @return Collection|array
     */
    public function getDirectionGroupStudentAllSort($direction_id, $group_id): Collection|array
    {
        return User::query()
            ->with(['language','type_of_education','form_of_education','student_course','transfer','dean_group','sex'])
            ->where('direction_id', '=', $direction_id)
            ->where('group_id', '=', $group_id)
            ->get()
            ->sortBy('full_name');
    }

    /**
     * @param $direction_id
     * @return Builder[]|Collection
     */
    public function getGroupStudentPaginate($direction_id): array|Collection
    {
        return User::query()
            ->with('dean_group', 'direction')
            ->where('direction_id', '=', $direction_id)
            ->groupBy('group_id')
            ->get();
    }

    /**
     * @return int
     */
    public function getAllStudentCount()
    {
        return User::query()
            ->where('level_id', '=', 4)
            ->count();
    }
}
