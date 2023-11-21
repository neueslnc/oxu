<?php

namespace App\Report\Rektor;

use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NBTestOnStudentModel;
use App\Models\Subject;
use App\Models\User;
use App\Domain\Directions\Models\Direction;

class NBController extends Controller
{
    protected $limit = 5;

    public function index()
    {

        return view('report.rektor.nb.index', [
            'groups' => DeanGroup::all(),
            'directions' => Direction::all(),
            'supervisors' => User::where('level_id', '=', '5')->get(),
            'teachers' => User::where('level_id', '=', '3')->get(),
            'subjects' => Subject::all(),
            'all' => NBTestOnStudentModel::with(['student.dean_group', 'get_supervisor', 'teacher', 'subject', 'test.theme', 'direction'])->limit($this->limit)->get(),
            'count' => ceil(NBTestOnStudentModel::count() / $this->limit)
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
  
 
    public function filter_nb(Request $request){
        $nb = new NBTestOnStudentModel;
    
        $nb = $nb->with(['student.dean_group', 'get_supervisor', 'teacher', 'subject', 'test.theme', 'direction']);

        if (!empty($request->input('student_id'))) {
    
            $nb = $nb->where('student_id', '=', $request->input('student_id'));
        }
    
        if (!empty($request->input('teacher_id'))) {
    
            $nb = $nb->where('teacher_id', '=', $request->input('teacher_id'));
        }
        if (!empty($request->input('subject_id'))) {
    
            $nb = $nb->where('subject_id', '=', $request->input('subject_id'));
        }
    
        if (!empty($request->input('semester_id'))) {
    
            $nb = $nb->where('semester_id', '=', $request->input('semester_id'));
        }
        if (!empty($request->input('direction_id'))) {
    
            $nb = $nb->where('direction_id', '=', $request->input('direction_id'));
        }
    
        if (!empty($request->input('supervisor_id'))) {
    
            $nb = $nb->where('supervisor_id', '=', $request->input('supervisor_id'));
        }
        
        if (!empty($request->input('status'))) {
    
            $nb = $nb->where('status', '=', $request->input('status'));
        }
        if (!empty($request->input('mb_test_theme_id'))) {
    
            $nb = $nb->where('mb_test_theme_id', '=', $request->input('mb_test_theme_id'));
        }
        if (!empty($request->input('date_from')) && !empty($request->input('date_to'))) {
    
            $nb = $nb->whereBetween('created_at', [$request->input('date_form'), $request->input('date_to')]);
        }
        $count = ceil($nb->count() / $this->limit);

        return response()->json([
            'objects' =>  $nb->skip((intval($request->input('paginate')) * $this->limit))->limit($this->limit)->get(),
            'page' => intval($request->input('paginate')),
            'count' => $count
        ]);
    }
}
