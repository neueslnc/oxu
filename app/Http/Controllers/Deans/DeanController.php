<?php

namespace App\Http\Controllers\Deans;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Deans\Groups\Repositories\DeanGroupRepository;
use App\Domain\Deans\Students\Repositories\DeanStudentRepository;
use App\Domain\Deans\TransferStudentGroup\Repositories\TransefStudentGroupRepository;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DeanController extends Controller
{
    /**
     * @var DeanStudentRepository
     */
    public $students;

    /**
     * @var TransefStudentGroupRepository
     */
    public $transfer_directions;

    /**
     * @var TransefStudentGroupRepository
     */
    public $transfer_groups;

    /**
     * @var TransefStudentGroupRepository
     */
    public $transfer_academic_leaves;

    /**
     * @var TransefStudentGroupRepository
     */
    public $transfer_give;


    public $groups;

    /**
     * @var
     */
    public $transfer_expulsion;

    /**
     * @param DeanStudentRepository $deanStudentRepository
     * @param TransefStudentGroupRepository $transefStudentGroupRepository
     */
    public function __construct(DeanStudentRepository $deanStudentRepository, TransefStudentGroupRepository $transefStudentGroupRepository, DeanGroupRepository $deanGroupRepository)
    {
        $this->students = $deanStudentRepository;
        $this->transfer_directions = $transefStudentGroupRepository;
        $this->transfer_groups = $transefStudentGroupRepository;
        $this->transfer_academic_leaves = $transefStudentGroupRepository;
        $this->transfer_give = $transefStudentGroupRepository;
        $this->groups = $deanGroupRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('deans(dekan).partials.index', [
            'student_count' => $this->students->getAllStudentCount(),
            'transfer_direction_count' => $this->transfer_directions->getAllTransferDirectionCount(),
            'transfer_group_count' => $this->transfer_groups->getAllTransferGroupCount(),
            'transfer_academic_year_count' => $this->transfer_academic_leaves->getAllTransferAcademicLeaveCount(),
            'transfer_give_count' => $this->transfer_give->getAllTransferGiveStudentCount(),
            'transfer_expulsion_count' => $this->transfer_give->getAllTransferExpulsionCount(),
            'years' => AcademicYear::query()->orderBy('id','desc')->get(),
            'group_count' => DeanGroup::query()->count()
        ]);
    }
}
