<?php

namespace App\Report\Rektor;

use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Directions\Models\Direction;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Domain\StudentCourses\Models\StudentCourse;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Language;
use App\Models\Subject;
use App\Models\TypeOfEducationModel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeanController extends Controller
{
//    Student Start
    /**
     * @return JsonResponse
     */

    protected $limit = 5;

    public function index()
    {

        return view('report.rektor.dean.index', [
            'groups' => DeanGroup::all(),
            'directions' => Direction::all(),
            'subjects' => Subject::all(),
            'languages' => Language::all(),
            'type_of_educations' => TypeOfEducationModel::all(),
            'form_of_educations' => FormOfEducation::all(),
            'group_courses' => StudentCourse::all(),
            'academic_years' => AcademicYear::all(),
            'all' => User::with([
            'dean_group',
            'dean_group.get_group_akademik_year',  
            'language', 
            'type_of_education', 
            'form_of_education', 
            'direction', 
            'student_course'])->where('level_id', '=', 4)->limit($this->limit)->get(),
            'count' => ceil(User::where('level_id', '=', 4)->count() / $this->limit),
            'count_elements_page' => $this->limit
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
        $limit_page = $this->limit;

        $student = User::with([
        'dean_group',
        'dean_group.get_group_akademik_year',  
        'language', 
        'type_of_education', 
        'form_of_education', 
        'direction', 
        'student_course'])->where('level_id', '=', 4);

        if (!empty($request->count_elements_page)) {
            $limit_page = intval($request->count_elements_page);
        }

        if (!empty($request->hemis_id)) {
            $student = $student->where('hemis_id', '=', $request->hemis_id);
        }

        if (!empty($request->full_name)) {
            $student = $student->where('full_name', '=', $request->full_name);
        }

        if (!empty($request->number_phone)) {
            $student = $student->where('number_phone', '=', $request->number_phone);
        }

        if (!empty($request->level_id)) {
            $student = $student->where('level_id', '=', $request->level_id);
        }

        if (!empty($request->department_id)) {
            $student = $student->where('department_id', '=', $request->department_id);
        }

        if (!empty($request->mb_status)) {
            $student = $student->where('mb_status', '=', $request->mb_status);
        }

        if (!empty($request->debit_contrakt)) {
            $student = $student->where('debit_contrakt', '=', $request->debit_contrakt);
        }

        if (!empty($request->student_id)) {
            $student = $student->where('student_id', '=', $request->student_id);
        }

        if (!empty($request->language_id)) {
            $student = $student->where('language_id', '=', $request->language_id);
        }

        if (!empty($request->type_of_education_id)) {
            $student = $student->where('type_of_education_id', '=', $request->type_of_education_id);
        }

        if (!empty($request->form_of_education_id)) {
            $student = $student->where('form_of_education_id', '=', $request->form_of_education_id);
        }

        if (!empty($request->direction_id)) {
            $student = $student->where('direction_id', '=', $request->direction_id);
        }

        if (!empty($request->student_course_id)) {
            $student = $student->where('student_course_id', '=', $request->student_course_id);
        }

        if (!empty($request->group_id)) {
            $student = $student->where('group_id', '=', $request->group_id);
        }

        if (!empty($request->sex_id)) {
            $student = $student->where('sex_id', '=', $request->sex_id);
        }

        if (!empty($request->input('date_from')) && !empty($request->input('date_to'))) {
    
            $student = $student->whereBetween('created_at', [($request->input('date_from'). " 00:00:00"), ($request->input('date_to'). " 00:00:00")]);
        }

        $count = ceil($student->count() / $limit_page);

        return response()
            ->json([
                'objects' =>  $student->skip((intval($request->input('paginate')) * $limit_page))->limit($limit_page)->get(),
                'status' => true,
                'page' => intval($request->input('paginate')),
                'count' => $count
            ]);
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
