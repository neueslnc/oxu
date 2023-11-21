<?php

namespace App\Http\Controllers\Deans\Transfers;

use App\Domain\Deans\Groups\Repositories\DeanGroupRepository;
use App\Domain\Deans\Students\Models\Student;
use App\Domain\Deans\Students\Repositories\DeanStudentRepository;
use App\Domain\Deans\TransferStudentGroup\Actions\StoreTransferStudentGroupAction;
use App\Domain\Deans\TransferStudentGroup\DTO\StoreTransferStudentGroupDTO;
use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use App\Domain\Deans\TransferStudentGroup\Repositories\TransefStudentGroupRepository;
use App\Domain\Deans\TransferStudentGroup\Requests\StoreTransferStudentGroupRequest;
use App\Domain\Directions\Repositories\DirectionRepository;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TransferStudentGroupController extends Controller
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('deans(dekan).transfer_student_groups.index', [
            'transfers' => $this->transfers->getPaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('deans(dekan).transfer_student_groups.create', [
            'students' => $this->students->getAll(),
            'directions' => $this->directions->getAll(),
            'groups' => $this->groups->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTransferStudentGroupRequest $request
     * @param StoreTransferStudentGroupAction $action
     * @return RedirectResponse
     */
    public function store(StoreTransferStudentGroupRequest $request, StoreTransferStudentGroupAction $action)
    {
        try {
            $dto = StoreTransferStudentGroupDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->back();
    }

//    /**
//     * @param Request $request
//     * @param StoreTransferStudentGroupAction $action
//     * @return RedirectResponse
//     */
//    public function storeChangeDirection(Request $request, StoreTransferStudentGroupAction $action): RedirectResponse
//    {
//        try {
//            $dto = StoreTransferStudentGroupDTO::fromArray($request->all());
//            $action->execute($dto);
//        } catch (Exception $exception) {
//            return redirect()->back();
//        }
//
//        return redirect()->route('transfer.directionAll');
//    }

    /**
     * @param Request $request
     * @param StoreTransferStudentGroupAction $action
     * @return RedirectResponse
     */
    public function storeExpulsionStudent(Request $request, StoreTransferStudentGroupAction $action): RedirectResponse
    {
        try {
            $dto = StoreTransferStudentGroupDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param StoreTransferStudentGroupAction $action
     * @return RedirectResponse
     */
    public function storeAcademicLeaveStudent(Request $request, StoreTransferStudentGroupAction $action): RedirectResponse
    {
        try {
            $dto = StoreTransferStudentGroupDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param StoreTransferStudentGroupAction $action
     * @return RedirectResponse
     */
    public function storeGiveStudent(Request $request, StoreTransferStudentGroupAction $action): RedirectResponse
    {
        try {
            $dto = StoreTransferStudentGroupDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param StoreTransferStudentGroupAction $action
     * @return RedirectResponse
     */
    public function storeOTMStudent(Request $request, StoreTransferStudentGroupAction $action): RedirectResponse
    {
        try {
            $dto = StoreTransferStudentGroupDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    /**
//     * @param Request $request
//     * @return RedirectResponse
//     */
//    public function transferStatus(Request $request): RedirectResponse
//    {
//        $student = User::query()
//            ->where('id', '=', $request->student_id)
//            ->first();
//
//        $transfer = TransferStudentGroup::query()
//            ->where('student_id', '=', $request->student_id)
//            ->first();
//
//        if ($request->transfer_group_id != null) {
//            $student->update([
//                'group_id' => $request->transfer_group_id
//            ]);
//        } elseif ($request->transfer_direction_id != null) {
//            $student->update([
//                'direction_id' => $request->transfer_direction_id
//            ]);
//        }
//
//        $transfer->update([
//            'status' => 1
//        ]);
//
//        return redirect()->back();
//    }

    /**
     * @return Application|Factory|View
     */
    public function getPaginateTransferGroup(): View|Factory|Application
    {
        return view('deans(dekan).transfer_student_groups.groupTransfers', [
            'transfers' => $this->transfers->getPaginateTransferGroup()
        ]);
    }

    public function updateTransferUploadFile(Request $request, $transfer)
    {
        $transfer = TransferStudentGroup::query()->find($transfer);
        $transfer->desc = $request->desc;
        if($request->file('file')){
            $file = $request->file;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('students/files/', $filename);
            $transfer->file = $filename;
        }
        $transfer->update();

        return redirect()->back();
    }

//    /**
//     * @return Application|Factory|View
//     */
//    public function getPaginateTransferDirection(): View|Factory|Application
//    {
//        return view('deans(dekan).transfer_student_groups.directionTransfers', [
//            'transfers' => $this->transfers->getPaginateTransferDirection()
//        ]);
//    }

    /**
     * @return Application|Factory|View
     */
    public function getPaginateTransferExpulsion(): View|Factory|Application
    {
        return view('deans(dekan).transfer_student_groups.expulsion', [
            'transfers' => $this->transfers->getPaginateTransferExpulsion()
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function getPaginateAcademicLeave(): View|Factory|Application
    {
        return view('deans(dekan).transfer_student_groups.academic', [
            'transfers' => $this->transfers->getPaginateAcademicLeave()
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function getPaginateGiveStudent(): View|Factory|Application
    {
        return view('deans(dekan).transfer_student_groups.give', [
            'transfers' => $this->transfers->getPaginateGiveStudent()
        ]);
    }

    public function getPaginateRecoveryStudent(): View|Factory|Application
    {
        return view('deans(dekan).transfer_student_groups.recovery', [
            'transfers' => $this->transfers->getPaginateRecoveryStudent()
        ]);
    }

    public function getPaginateOTMStudent(): View|Factory|Application
    {
        return view('deans(dekan).transfer_student_groups.otm', [
            'transfers' => $this->transfers->getPaginateOTMStudent()
        ]);
    }

    public function downloadFile($fileName)
    {
        $file = public_path() . "/students/files/" . $fileName;

        $headers = array(
            'Content-Type: application/' . substr($fileName, 11),
        );

        return Response::download($file, $fileName, $headers);
    }

    /**
     * @return Application|Factory|View
     */
    public function reportData()
    {
        return view('deans(dekan).reports.index', [
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
    public function monthlyReportView()
    {
        return view('deans(dekan).reports.month',[
            'reports' => $this->transfers->groupByTransferMonthly(),
        ]);
    }

    /**
     * @param $date
     * @return Application|Factory|View
     */
    public function monthlyReportViewData($date){
        return view('deans(dekan).reports.monthViewData',[
            'reports' => $this->transfers->groupByTransferMonthlyData($date),
            'transfers' => TransferStudentGroup::query(),
            'students' => $this->students->getAll(),
            'groups' => $this->groups->getAll(),
            'date' => $date,
            'all_student_count' => User::select('level_id')->where('level_id','=',4)->count(),
            'all_tsch_count' => TransferStudentGroup::select('status','created_at')->where('status','=',2)->where(DB::raw('substr(created_at,1,10)'),'=',$date)->count(),
            'all_academic_leave_count' => TransferStudentGroup::select('status','created_at')->where('status','=',3)->where(DB::raw('substr(created_at,1,10)'),'=',$date)->count(),
            'all_exit_group_count' => TransferStudentGroup::select('status','exit_group_id','transfer_group_id','created_at')->whereColumn('exit_group_id','!=','transfer_group_id')->where(DB::raw('substr(created_at,1,10)'),'=',$date)->where('status','=',1)->count(),
            'all_transfer_group_count' => TransferStudentGroup::select('status','exit_group_id','transfer_group_id','created_at')->whereColumn('exit_group_id','!=','transfer_group_id')->where(DB::raw('substr(created_at,1,10)'),'=',$date)->where('status','=',3)->count(),
            'all_student_transfer_count' => (User::select('level_id')->where('level_id','=',4)->count() - TransferStudentGroup::select('id','created_at')->where(DB::raw('substr(created_at,1,10)'),'=',$date)->count()),
        ]);
    }

    /**
     * @param Request $request
     * @param $transfer_id
     * @return RedirectResponse
     */
    public function studentRecovery(Request $request,$transfer_id): RedirectResponse
    {
        $transfer = new TransferStudentGroup();
        $transfer_old_data = TransferStudentGroup::query()->find($transfer_id);
        $user = User::withTrashed()->where('id','=',$request->user_id)->first();

        $transfer->academic_year = $request->academic_year;
        $transfer->desc = $request->desc;
        $transfer->status = $request->status;
        if ($request->file('file')) {
            $file = $request->file;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('students/files/', $filename);
            $transfer->file = $filename;
        }
        $transfer->exit_direction_id = $transfer_old_data->exit_direction_id;
        $transfer->transfer_direction_id = $transfer_old_data->transfer_direction_id;
        $transfer->exit_group_id = $transfer_old_data->exit_group_id;
        $transfer->transfer_group_id = $transfer_old_data->transfer_group_id;
        $transfer->student_id = $transfer_old_data->student_id;
        $transfer->save();
        $user->restore();
        $transfer_old_data->status = 0;
        $transfer_old_data->update();

        return redirect()->back();
    }
}
