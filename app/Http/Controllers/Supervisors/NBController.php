<?php

namespace App\Http\Controllers\Supervisors;

use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Directions\Models\Direction;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Domain\StudentCourses\Models\StudentCourse;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\DirectionOnSupervisorModel;
use App\Models\Language;
use App\Models\NBTestOnStudentModel;
use App\Models\Subject;
use App\Models\TypeOfEducationModel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NBController extends Controller
{
//    Student Start
    /**
     * @return JsonResponse
     */

    protected $limit = 50;

    public function index(Request $request)
    {

        $dean_group = [];
        $directions = [];
        $supervisors = [];
        $all_nb = [];

        if($request->user()->level_id == 6){
            $dean_group = DeanGroup::all();
            $directions = Direction::all();
            $supervisors = User::where('level_id', '=', '5')->get();
            $all_nb = NBTestOnStudentModel::with(['student.group', 'supervisor', 'direction', 'teacher', 'subject', 'test.theme.direction'])->limit($this->limit)->orderBy('date', 'DESC')->get();
        }elseif ($request->user()->level_id == 5){
            $dean_group = $request->user()->get_group_supervisors;
            $directions = DirectionOnSupervisorModel::with(['direction'])->where('superviosr_id', '=', $request->user()->id)->get();
            $directions = $directions->pluck('direction');
            $all_nb = NBTestOnStudentModel::with(['student.group', 'supervisor', 'direction', 'teacher', 'subject', 'test.theme.direction'])->where('supervisor_id', '=', $request->user()->id)->limit($this->limit)->orderBy('date', 'DESC')->get();
        }

        return view('supervisors.nb.index', [
            'groups' => $dean_group,
            'directions' => $directions,
            'supervisors' => $supervisors,
            'subjects' => Subject::all(),
            'teachers' => User::where('level_id', '=', 3)->get(),
            'all' => $all_nb,
            'count' => ceil(NBTestOnStudentModel::count() / $this->limit),
            'count_elements_page' => $this->limit
        ]);
    }

    public function store(Request $request){
        $limit_page = $this->limit;

        $nb = NBTestOnStudentModel::with(['student.group', 'supervisor', 'direction', 'teacher', 'subject', 'test.theme.direction'])->limit($this->limit);

        if (!empty($request->count_elements_page)) {
            $limit_page = intval($request->count_elements_page);
        }

        if (!empty($request->search_input)) {

            $full_name = $request->search_input;

            $nb = $nb->whereHas('student', function ($query) use ($full_name) {
                return $query->where('full_name', 'LIKE', '%'.$full_name.'%')->orWhere('hemis_id', '=', $full_name);
            });
        }

        if (!empty($request->group_id)) {
            $group = $request->group_id;

            $nb = $nb->whereHas('student', function ($query) use ($group) {
                return $query->where('group_id', '=', $group);
            });
        }

        if (!empty($request->direction_id)) {

            $nb = $nb->where('direction_id', '=', $request->direction_id);
        }

        if (!empty($request->subject_id)) {

            $nb = $nb->where('subject_id', '=', $request->subject_id);
        }

        if (!empty($request->teacher_id)) {

            $nb = $nb->where('teacher_id', '=', $request->teacher_id);
        }

        if (!empty($request->supervisor_id)) {

            $nb = $nb->where('supervisor_id', '=', $request->supervisor_id);
        }

        if (!empty($request->input('date_from')) && !empty($request->input('date_to'))) {

            $nb = $nb->whereBetween('date', [$request->input('date_from'), $request->input('date_to')]);
        }

        $count = ceil($nb->count() / $limit_page);

        return response()
            ->json([
                'objects' =>  $nb->skip((intval($request->input('paginate')) * $limit_page))->limit($limit_page)->orderBy('date', 'DESC')->get(),
                'status' => true,
                'page' => intval($request->input('paginate')),
                'count' => $count
            ]);
    }

    public function paginateStudent(): JsonResponse
    {
        $students = User::query()
            ->where('level_id', '=', 4)
            ->orderBy('id', 'desc')
            ->paginate(15);

        return response()
            ->json([
                'status' => true,
                'data' => $students
            ]);
    }

    /**
     * @return JsonResponse
     */
    public function indexStudent(): JsonResponse
    {
        $students = User::query()
            ->where('level_id', '=', 4)
            ->orderBy('id', 'desc')
            ->get();

        return response()
            ->json([
                'status' => true,
                'data' => $students
            ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function filterStudent(Request $request): JsonResponse
    {

    }

//    Student End
//    Transfer Student Start

    /**
     * @return JsonResponse
     */
    public function paginateTransferStudent(): JsonResponse
    {
        $transfers = TransferStudentGroup::query()
            ->with(['student', 'exit_direction', 'transfer_direction', 'exit_group', 'transfer_group'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return response()
            ->json([
                'status' => true,
                'data' => $transfers
            ]);
    }

    /**
     * @return JsonResponse
     */
    public function indexTransferStudent(): JsonResponse
    {
        $transfers = TransferStudentGroup::query()
            ->with(['student', 'exit_direction', 'transfer_direction', 'exit_group', 'transfer_group'])
            ->orderBy('id', 'desc')
            ->get();

        return response()
            ->json([
                'status' => true,
                'data' => $transfers
            ]);
    }

    /**
     * @return JsonResponse
     */
    public function filterTransferStudent(): JsonResponse
    {
        $transfers = TransferStudentGroup::query()
            ->with(['student', 'exit_direction', 'transfer_direction', 'exit_group', 'transfer_group']);

        if (!empty($request->student_id)) {
            $transfers = $transfers->where('student_id', '=', $request->student_id);
        }

        if (!empty($request->exit_direcion_id)) {
            $transfers = $transfers->where('exit_direcion_id', '=', $request->exit_direcion_id);
        }

        if (!empty($request->transfer_direction_id)) {
            $transfers = $transfers->where('transfer_direction_id', '=', $request->transfer_direction_id);
        }

        if (!empty($request->exit_group_id)) {
            $transfers = $transfers->where('exit_group_id', '=', $request->exit_group_id);
        }

        if (!empty($request->transfer_group_id)) {
            $transfers = $transfers->where('transfer_group_id', '=', $request->transfer_group_id);
        }

        if (!empty($request->status)) {
            $transfers = $transfers->where('status', '=', $request->status);
        }

        if (!empty($request->date)) {
            $transfers = $transfers->whereBetween('date', [$request->from, $request->to]);
        }

        $transfers->get();

        return response()
            ->json([
                'status' => true,
                'data' => $transfers
            ]);
    }

//    Transfer Student End
}
