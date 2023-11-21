<?php

namespace App\Report\SuperVisors;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Http\Controllers\Controller;
use App\Models\ExamTestOnStudentModel;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class TestController extends Controller
{
    protected $limit = 5;

    public function index (){

        return view('report.super_visors.test.index', [
            'groups' => DeanGroup::all(),
            'all' => ExamTestOnStudentModel::with('student.dean_group')->where('supervisor_view', '=', 1)->where('status', '=', 1)->limit($this->limit)->get(),
            'count' => ceil(ExamTestOnStudentModel::where('supervisor_view', '=', 1)->where('status', '=', 1)->count() / $this->limit)
        ]);
    }

    public function finishing_exam_student(Request $request)
    {

        return view('report.rektor.finishing_exam.index', [
            'groups' => DeanGroup::all(),
            'all' => ExamTestOnStudentModel::with('student.dean_group')->where('status', '=', 1)->limit($this->limit)->get(),
            'count' => ceil(ExamTestOnStudentModel::where('status', '=', 1)->count() / $this->limit)
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

        $exam = $exam->with(['student.dean_group'])->where('supervisor_view', '=', 1)->where('status', '=', 1);

        if (!empty($request->input('status'))) {

            $exam = $exam->where('status', '=', $request->input('status'));
        }

        if (!empty($request->input('group_id'))) {

            $group_id = $request->input('group_id');

            $exam = $exam->whereHas('student', function ($query) use ($group_id) {
                return $query->where('group_id', '=', $group_id);
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
