<?php

namespace App\Report\Rektor;

use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NBTestOnStudentModel;
use App\Models\Subject;
use App\Models\User;
use App\Domain\Directions\Models\Direction;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Domain\StudentCourses\Models\StudentCourse;
use App\Models\AcademicYear;
use App\Models\Language as ModelsLanguage;
use App\Models\TypeOfEducationModel;
use JetBrains\PhpStorm\Language;

class GroupController extends Controller
{
    protected $limit = 5;

    public function index()
    {

        $dean = new DeanGroup;

        $dean_count = $dean->count();

        $dean_item = $dean->withCount(['get_students', 'get_who_came_student', 'get_departed_student'])->with([
            "get_language",
            "get_type_of_education_id",
            "get_form_of_education_id",
            "get_direction_id",
            "get_group_course_id",
            "get_group_akademik_year",
            "get_supervisor"
        ]);

        return view('report.rektor.dean.group', [
            'directions' => Direction::all(),
            'subjects' => Subject::all(),
            'languages' => ModelsLanguage::all(),
            'type_of_educations' => TypeOfEducationModel::all(),
            'form_of_educations' => FormOfEducation::all(),
            'group_courses' => StudentCourse::all(),
            'academic_years' => AcademicYear::all(),
            'groups' => $dean_item->skip((0 * $this->limit))->limit($this->limit)->get(),
            'count' => ceil($dean_count / $this->limit),
            'count_elements_page' => $this->limit
        ]);
    }

    public function get_student(Request $request)
    {

        $user = new User;

        if (!empty($request->input('group_id'))) {

            $user = $user->where('group_id', '=', $request->input('group_id'));

            return response()->json([
                'objects' => $user->where('level_id', '=', 4)->get()
            ]);
        }

        return response()->json([
            'objects' => []
        ]); 
    }
  
 
    public function filter_group(Request $request){
        $limit_page = $this->limit;

        $groups = new DeanGroup;

        $groups = DeanGroup::withCount(['get_students', 'get_who_came_student', 'get_departed_student'])->with([
            "get_language",
            "get_type_of_education_id",
            "get_form_of_education_id",
            "get_direction_id",
            "get_group_course_id",
            "get_group_akademik_year",
            "get_supervisor"
        ]);

        if (!empty($request->input('count_elements_page'))) {
            $limit_page = intval($request->count_elements_page);
        }

        if( !empty($request->input('language_id')) ) {
            $groups = $groups->where('language_id', '=', $request->input('language_id'));
        }

        if( !empty($request->input('type_of_education_id')) ) {
            $groups = $groups->where('type_of_education_id', '=', $request->input('type_of_education_id'));
        }

        if( !empty($request->input('form_of_education_id')) ) {
            $groups = $groups->where('form_of_education_id', '=', $request->input('form_of_education_id'));
        }

        if( !empty($request->input('direction_id')) ) {
            $groups = $groups->where('direction_id', '=', $request->input('direction_id'));
        }

        if( !empty($request->input('group_course_id')) ) {
            $groups = $groups->where('group_course_id', '=', $request->input('group_course_id'));
        }

        if( !empty($request->input('group_akademik_year')) ) {
            $groups = $groups->where('group_akademik_year', '=', $request->input('group_akademik_year'));
        }

        $count = ceil($groups->count() / $limit_page);

        return response()
            ->json([
                'objects' =>  $groups->skip((intval($request->input('paginate')) * $limit_page))->limit($limit_page)->get(),
                'status' => true,
                'page' => intval($request->input('paginate')),
                'count' => $count
            ]);
    }
}
