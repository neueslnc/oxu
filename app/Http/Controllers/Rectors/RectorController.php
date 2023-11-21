<?php

namespace App\Http\Controllers\Rectors;

use App\Domain\Deans\Groups\Repositories\DeanGroupRepository;
use App\Domain\Deans\Students\Repositories\DeanStudentRepository;
use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use App\Domain\Deans\TransferStudentGroup\Repositories\TransefStudentGroupRepository;
use App\Domain\Directions\Repositories\DirectionRepository;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RectorController extends Controller
{
    /**
     * @var TransefStudentGroupRepository
     */
    public $transfers;

    /**
     * @var DirectionRepository
     */
    public $directions;

    /**
     * @var DeanGroupRepository
     */
    public $groups;

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

    /**
     * @param TransefStudentGroupRepository $transefStudentGroupRepository
     * @param DeanStudentRepository $deanStudentRepository
     * @param DeanGroupRepository $deanGroupRepository
     * @param DirectionRepository $directionRepository
     */
    public function __construct(TransefStudentGroupRepository $transefStudentGroupRepository, DeanStudentRepository $deanStudentRepository, DeanGroupRepository $deanGroupRepository, DirectionRepository $directionRepository)
    {
        $this->transfers = $transefStudentGroupRepository;
        $this->directions = $directionRepository;
        $this->groups = $deanGroupRepository;
        $this->students = $deanStudentRepository;
        $this->transfer_directions = $transefStudentGroupRepository;
        $this->transfer_groups = $transefStudentGroupRepository;
        $this->transfer_academic_leaves = $transefStudentGroupRepository;
        $this->transfer_give = $transefStudentGroupRepository;
    }

    public function report()
    {
        return view('rectors.reports.index', [
            'reports' => $this->transfers->getAll(),
            'transfers' => TransferStudentGroup::query(),
            'students' => $this->students->getAll(),
            'groups' => $this->groups->getAll(),
            'all_student_count' => User::select('level_id')->where('level_id','=',4)->count(),
            'all_tsch_count' => TransferStudentGroup::select('status')->where('status','=',2)->count(),
            'all_academic_leave_count' => TransferStudentGroup::select('status')->where('status','=',3)->count(),
            'all_exit_group_count' => TransferStudentGroup::select('status','exit_group_id','transfer_group_id')->whereColumn('exit_group_id','!=','transfer_group_id')->where('status','=',1)->count(),
            'all_transfer_group_count' => TransferStudentGroup::select('status','exit_group_id','transfer_group_id')->whereColumn('exit_group_id','!=','transfer_group_id')->where('status','=',3)->count(),
            'all_student_transfer_count' => (User::select('level_id')->where('level_id','=',4)->count() - TransferStudentGroup::select('id')->count()),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('rectors.partials.index', [
            'student_count' => $this->students->getAllStudentCount(),
            'transfer_direction_count' => $this->transfer_directions->getAllTransferDirectionCount(),
            'transfer_group_count' => $this->transfer_groups->getAllTransferGroupCount(),
            'transfer_academic_year_count' => $this->transfer_academic_leaves->getAllTransferAcademicLeaveCount(),
            'transfer_give_count' => $this->transfer_give->getAllTransferGiveStudentCount(),
            'transfer_expulsion_count' => $this->transfer_give->getAllTransferExpulsionCount(),
            'years' => AcademicYear::query()->orderBy('id','desc')->get()
        ]);
    }
}
