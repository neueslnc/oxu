<?php

namespace App\Http\Controllers\Supervisors;

use App\Models\DirectionOnSupervisorModel;
use App\Models\User;
use Exception;
use App\Models\Subject;
use App\Models\Sciences;
use App\Models\Semester;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Models\NBTestThemeModel;
use App\Models\ExamTestThemeModel;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\NBTestOnStudentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Supervisors\Models\Supervisor;
use Illuminate\Contracts\Foundation\Application;
use App\Domain\Supervisors\DTO\StoreSupervisorDTO;
use App\Domain\Supervisors\DTO\UpdateSupervisorDTO;
use App\Domain\Supervisors\Actions\StoreSupervisorAction;
use App\Domain\Supervisors\Actions\UpdateSupervisorAction;
use App\Domain\Directions\Repositories\DirectionRepository;
use App\Domain\Supervisors\Requests\StoreSupervisorRequest;
use App\Domain\Supervisors\Requests\UpdateSupervisorRequest;
use App\Domain\Supervisors\Repositories\SupervisorRepository;

class SupervisorController extends Controller
{
    /**
     * @var SupervisorRepository
     */
    public $supervisors;

    /**
     * @var DirectionRepository
     */
    public $directions;
    public $semesters;
    public $subjects;
    public $sciences;
    public $student_groups;

    /**
     * @param SupervisorRepository $supervisorRepository
     * @param DirectionRepository $directionRepository
     */
    public function __construct(SupervisorRepository $supervisorRepository, DirectionRepository $directionRepository)
    {
        $this->supervisors = $supervisorRepository;
        $this->directions = $directionRepository;
        $this->semesters = Semester::query()->get();
        $this->sciences = Sciences::query()->get();
        $this->subjects = Subject::query()->get();
        $this->student_groups = DeanGroup::get();
    }

    /**
     * @return Application|Factory|View
     */
    public function homepage()
    {
        $nb_list = NBTestOnStudentModel::with(['test.theme'])->get();

        return view('supervisors.partials.index',compact('nb_list'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('supervisors.attendances.index', ['nb_list' => NBTestOnStudentModel::with(['test.theme'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Request $request): View|Factory|Application
    {

        $direction = DirectionOnSupervisorModel::with(['direction'])->where('superviosr_id', '=', $request->user()->id)->get();

        $r = $direction->pluck('direction');

        return view('supervisors.attendances.create', [
            'directions' => $r->all(),
            'semesters' => $this->semesters,
            'sciences' => $this->sciences,
            'subjects' => $this->subjects,
            'student_groups' => $request->user()->get_group_supervisors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSupervisorRequest $request
     * @param StoreSupervisorAction $action
     * @return RedirectResponse
     */
    public function store(StoreSupervisorRequest $request, StoreSupervisorAction $action): RedirectResponse
    {
        try {
            $dto = StoreSupervisorDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }
        return redirect()->route('supervisors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Supervisor $supervisor
     * @return \Illuminate\Http\Response
     */
    public function show(Supervisor $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Supervisor $supervisor
     * @return Application|Factory|View
     */
    public function edit(Supervisor $supervisor): View|Factory|Application
    {
        return view('supervisors.attendances.edit', [
            'directions' => $this->directions->getAll(),
            'semesters' => $this->semesters,
            'sciences' => $this->sciences,
            'subjects' => $this->subjects,
            'student_groups' => $this->student_groups,
            'supervisor' => $supervisor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSupervisorRequest $request
     * @param Supervisor $supervisor
     * @param UpdateSupervisorAction $action
     * @return RedirectResponse
     */
    public function update(UpdateSupervisorRequest $request, Supervisor $supervisor, UpdateSupervisorAction $action): RedirectResponse
    {
        try {
            $request->merge([
                'supervisor' => $supervisor
            ]);
            $dto = UpdateSupervisorDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }
        return redirect()->route('supervisors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supervisor $supervisor
     * @return RedirectResponse
     */
    public function destroy(Supervisor $supervisor): RedirectResponse
    {
        $supervisor->delete();
        return redirect()->back();
    }

    public function data(Request $request){
        dd(1);
    }

    public function set_metrick_student_data(Request $request){

        User::where('id', '=', $request->input('user_id'))->update([
            "birthday" => $request->input("birthday"),
            "father_fio" => $request->input("father_fio"),
            "father_phone" => $request->input("father_phone"),
            "number_phone" => $request->input("number_phone"),
            "mather_fio" => $request->input("mather_fio"),
            "mather_phone" => $request->input("mather_phone"),
            "address" => $request->input("address"),
            "address_temporarily" => $request->input("address_temporarily"),
            "deprived_of_parental" => $request->input("deprived_of_parental"),
            "disabled" => $request->input("disabled"),
            "social_security" => $request->input("social_security"),
            "court" => $request->input("court"),
            "workplace" => $request->input("workplace"),
        ]);

        return response()->json([
            'status' => 'success',
            'user' => User::where('id', '=', $request->input('user_id'))->first()
        ]);
    }
}
