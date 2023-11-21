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

class GroupTransferController extends Controller
{
    protected $limit = 5;

    public function index()
    {

        $transef_student_group = new TransferStudentGroup;

        $transfer_student_count = $transef_student_group->count();

        $transfer_group = $transef_student_group->with([
            "student",
            "exit_group",
            "transfer_group",
            "exit_direction",
            "transfer_direction"
        ]);

        return view('report.rektor.dean.transfer_student_group', [
            'groups' => DeanGroup::all(),
            'transef_group' => $transfer_group->skip((0 * $this->limit))->limit($this->limit)->get(),
            'count' => ceil($transfer_student_count / $this->limit),
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
  
 
    public function filter_transfer_group(Request $request){
        $limit_page = $this->limit;

        $transfer_student = new TransferStudentGroup;

        $transfer_student = TransferStudentGroup::with([
            "student",
            "exit_group",
            "transfer_group",
            "exit_direction",
            "transfer_direction"
        ]);

        if (!empty($request->input('count_elements_page'))) {
            $limit_page = intval($request->count_elements_page);
        }

        if( !empty($request->input('to_group')) ) {
            $transfer_student = $transfer_student->where('exit_group_id', '=', $request->input('to_group'));
        }

        if( !empty($request->input('from_group')) ) {
            $transfer_student = $transfer_student->where('transfer_group_id', '=', $request->input('from_group'));
        }

        if (!empty($request->input('date_from')) && !empty($request->input('date_to'))) {
    
            $transfer_student = $transfer_student->whereBetween('created_at', [($request->input('date_from'). " 00:00:00"), ($request->input('date_to'). " 00:00:00")]);
        }
        
        $count = ceil($transfer_student->count() / $limit_page);

        return response()
            ->json([
                'objects' =>  $transfer_student->skip((intval($request->input('paginate')) * $limit_page))->limit($limit_page)->get(),
                'status' => true,
                'page' => intval($request->input('paginate')),
                'count' => $count
            ]);
    }
}
