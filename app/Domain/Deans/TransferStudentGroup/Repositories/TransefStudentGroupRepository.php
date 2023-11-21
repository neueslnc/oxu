<?php

namespace App\Domain\Deans\TransferStudentGroup\Repositories;

use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TransefStudentGroupRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function getPaginate(): LengthAwarePaginator
    {
        return TransferStudentGroup::query()
            ->with(['student','exit_direction','transfer_direction','exit_group','transfer_group'])
            ->orderBy('id', 'desc')
            ->paginate();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll(): Collection|array
    {
        return TransferStudentGroup::query()
            ->orderBy('id', 'desc')
            ->get();
    }

    public function groupByTransferMonthly()
    {
//        $myDate = '2020-12-01';
//        $date = Carbon::createFromFormat('Y-m-d', $myDate)->format('F');

        return TransferStudentGroup::query()
            ->select('transfer_student_groups.*', DB::raw('substr(created_at,1,10) as gr'))
            ->get()
            ->groupBy('gr');
    }

    /**
     * @param $date
     * @return Builder[]|Collection|\Illuminate\Support\Collection
     */
    public function groupByTransferMonthlyData($date)
    {
        return TransferStudentGroup::query()
            ->where(DB::raw('substr(created_at,1,10)'),'=',$date)
            ->get();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginateTransferGroup(): LengthAwarePaginator
    {
        return TransferStudentGroup::query()
            ->with(['exit_group','transfer_group'])
//            ->where('transfer_direction_id','=',null)
            ->where('status','=',1)
            ->orderBy('id', 'desc')
            ->paginate();
    }

//    /**
//     * @return LengthAwarePaginator
//     */
//    public function getPaginateTransferDirection(): LengthAwarePaginator
//    {
//        return TransferStudentGroup::query()
//            ->where('transfer_group_id','=',null)
//            ->where('status','!=',2)
//            ->where('status','!=',3)
//            ->where('status','!=',4)
//            ->orderBy('id', 'desc')
//            ->paginate();
//    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginateTransferExpulsion(): LengthAwarePaginator
    {
        return TransferStudentGroup::query()
            ->with(['student' => function($query){
                $query->withTrashed()->where('full_name','!=',null)->get();
            }])
            ->where('status','=',2)
            ->orderBy('id', 'desc')
            ->paginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginateAcademicLeave(): LengthAwarePaginator
    {
        return TransferStudentGroup::query()
            ->with(['student' => function($query){
                $query->where('full_name','!=',null);
            }])
            ->where('status','=',3)
            ->orderBy('id', 'desc')
            ->paginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginateGiveStudent(): LengthAwarePaginator
    {
        return TransferStudentGroup::query()
            ->where('status','=',4)
            ->orderBy('id', 'desc')
            ->paginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginateRecoveryStudent(): LengthAwarePaginator
    {
        return TransferStudentGroup::query()
            ->where('status','=',6)
            ->orderBy('id', 'desc')
            ->paginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginateOTMStudent(): LengthAwarePaginator
    {
        return TransferStudentGroup::query()
            ->with(['student' => function($query){
                $query->withTrashed()->get();
            }])
            ->where('status','=',5)
            ->orderBy('id', 'desc')
            ->paginate();
    }

    /**
     * @return int
     */
    public function getAllTransferGroupCount(): int
    {
        return TransferStudentGroup::query()
            ->where('transfer_direction_id','=',null)
            ->where('status','!=',2)
            ->where('status','!=',3)
            ->where('status','!=',4)
            ->count();
    }

    /**
     * @return int
     */
    public function getAllTransferDirectionCount(): int
    {
        return TransferStudentGroup::query()
            ->where('transfer_group_id','=',null)
            ->where('status','!=',2)
            ->where('status','!=',3)
            ->where('status','!=',4)
            ->count();
    }

    /**
     * @return int
     */
    public function getAllTransferExpulsionCount(): int
    {
        return TransferStudentGroup::query()
            ->where('status','=',2)
            ->count();
    }

    /**
     * @return int
     */
    public function getAllTransferAcademicLeaveCount(): int
    {
        return TransferStudentGroup::query()
            ->where('status','=',3)
            ->count();
    }

    /**
     * @return int
     */
    public function getAllTransferGiveStudentCount(): int
    {
        return TransferStudentGroup::query()
            ->where('status','=',4)
            ->count();
    }
}
