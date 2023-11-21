<?php

namespace App\Http\Controllers\Booker;

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

class StudentController extends Controller
{

    protected $limit = 5;


    public function index()
    {
        return view('booker.student.index', [
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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

        if (!empty($request->search_input)) {
            $student = $student->where('full_name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('student_id', 'LIKE', '%'.$request->search_input.'%');

            $a = 1;
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

        $count = ceil($student->count() / $limit_page);

        return response()
            ->json([
                'objects' =>  $student->skip((intval($request->input('paginate')) * $limit_page))->limit($limit_page)->get(),
                'status' => true,
                'page' => intval($request->input('paginate')),
                'count' => $count
            ]);
    }

    public function updateDebitContraktStudent(Request $request){

        $student = User::where('student_id', '=', $request->input('student_id'))->first();

        $student->debit_contrakt = $request->input('debit_contrakt');
        $student->contract_price = $request->input('contract_price');

        $student->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
