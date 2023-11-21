<?php

namespace App\Report\Rektor;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Directions\Models\Direction;
use App\Http\Controllers\Controller;
use App\Models\ExamTestOnStudentModel;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class TestController extends Controller
{
    protected $limit = 5;

    public function index (){

        return view('report.rektor.test.index', [
            'groups' => DeanGroup::all(),
            'all' => ExamTestOnStudentModel::with(['student.dean_group', 'exam' => function ($query) {
                $query->with(['direction', 'subject']);
            }])->limit($this->limit)->get(),
            'count' => ceil(ExamTestOnStudentModel::count() / $this->limit),
            'directions' => Direction::all(),
            'subjects' => Subject::all()
        ]);
    }

    public function finishing_exam_student(Request $request)
    {

        return view('report.rektor.finishing_exam.index', [
            'groups' => DeanGroup::all(),
            'all' => ExamTestOnStudentModel::with(['student.dean_group', 'exam' => function ($query) {
                $query->with(['direction', 'subject']);
            }])->where('status', '=', 1)->limit($this->limit)->get(),
            'count' => ceil(ExamTestOnStudentModel::where('status', '=', 1)->count() / $this->limit),
            'directions' => Direction::all(),
            'subjects' => Subject::all()
        ]);
    }

    public function save_exam_result_supervisor(Request $request)
    {
        $examTestOnStudentModel = ExamTestOnStudentModel::where('id', '=', $request->input('theme_id'))->first();

        $examTestOnStudentModel->supervisor_question_count = $request->input('supervisor_question_count');
        $examTestOnStudentModel->supervisor_question_success = $request->input('supervisor_question_success');
        $examTestOnStudentModel->supervisor_question_rejerect = $request->input('supervisor_question_rejerect');
        $examTestOnStudentModel->supervisor_ball = $request->input('supervisor_ball');

        $examTestOnStudentModel->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function set_supervisor_view(Request $request)
    {

        if (!empty($request->input('theme_id'))) {

            $examTestOnStudentModel = ExamTestOnStudentModel::where('id', '=', $request->input('theme_id'))->first();

            $examTestOnStudentModel->supervisor_view = $request->input('supervisor_view');

            $examTestOnStudentModel->save();

            return response()->json([
                'status' => 'ok'
            ]);
        }

        $examTestOnStudentModel = new ExamTestOnStudentModel;

        $examTestOnStudentModel->where('id', '>', 0)
        ->update([
            'supervisor_view' => 1
        ]);

        return response()->json([
            'status' => 'ok1'
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

    public function filter_test(Request $request)
    {
        $exam = new ExamTestOnStudentModel;
        
        $exam = $exam->with(['student.dean_group', 'exam', 'exam' => function ($query) {
            $query->with(['direction', 'subject']);
        }]);

        if (!empty($request->input('status'))) {

            $exam = $exam->where('status', '=', $request->input('status'));
        }

        if (!empty($request->input('group_id'))) {

            $group_id = $request->input('group_id');

            $exam = $exam->whereHas('student', function ($query) use ($group_id) {
                return $query->where('group_id', '=', $group_id);
            });
        }

        if (!empty($request->input('direction_id'))) {


            // dd($request->input('direction_id'));
            $direction_id = $request->input('direction_id');

            $exam = $exam->whereHas('exam', function ($query) use ($direction_id) {
                return $query->where('direction_id', '=', $direction_id);
            });
        }

        if (!empty($request->input('subject_id'))) {

            $subject_id = $request->input('subject_id');

            $exam = $exam->whereHas('exam', function ($query) use ($subject_id) {
                return $query->where('subject_id', '=', $subject_id);
            });
        }

        if (!empty($request->input('student_id'))) {

            $exam = $exam->where('student_id', '=', $request->input('student_id'));
        }

        if (!empty($request->input('date_from')) && !empty($request->input('date_to'))) {
    
            $exam = $exam->whereBetween('created_at', [($request->input('date_from'). " 00:00:00"), ($request->input('date_to'). " 00:00:00")]);
        }

        $count = ceil($exam->count() / $this->limit);

        return response()->json([
            'objects' =>  $exam->skip((intval($request->input('paginate')) * $this->limit))->limit($this->limit)->get(),
            'page' => intval($request->input('paginate')),
            'count' => $count
        ]);
    }
}
