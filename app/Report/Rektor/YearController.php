<?php

namespace App\Report\Rektor;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
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

class YearController extends Controller
{
    protected $limit = 5;

    public function index()
    {

        $year = new AcademicYear;

        $year_count = $year->count();

        $years = $year->withCount([
            "get_group_student"
        ]);

        return view('report.rektor.dean.year', [
            'years' => $years->skip((0 * $this->limit))->limit($this->limit)->get(),
            'count' => ceil($year_count / $this->limit),
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
  
 
    public function filter_transfer_year(Request $request){
        
        $limit_page = $this->limit;

        $year = new AcademicYear;

        $years = $year->withCount([
            "get_group_student"
        ]);

        if (!empty($request->input('count_elements_page'))) {
            $limit_page = intval($request->count_elements_page);
        }
        
        $count = ceil($year->count() / $limit_page);

        return response()
            ->json([
                'objects' =>  $years->skip((intval($request->input('paginate')) * $limit_page))->limit($limit_page)->get(),
                'status' => true,
                'page' => intval($request->input('paginate')),
                'count' => $count
            ]);
    }
}
