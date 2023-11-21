<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamsContorlPC;
use App\Models\ExamTestOnStudentModel;
use App\Models\User;
use App\Domain\Directions\Models\Direction;
use App\Models\Subject;

class StudentExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pc = ExamsContorlPC::where('nomer', '=', $request->input('nomer') )->first();

        $exam_test = ExamTestOnStudentModel::with('exam.direction', 'exam.subject')->where('student_id', '=', $pc->user_id)->where('status', '=', 0)->first();

        $student = User::with('group')->where('id', '=', $pc->user_id)->first();

        $time = $exam_test['finishing_date_time'];

        if (ExamTestOnStudentModel::where('student_id', '=', $student->id)->where('status', '=', 0)->first()->start_date_time == null ){
            $exam_test_on_student = ExamTestOnStudentModel::where('student_id', '=', $pc->user_id)->where('status', '=', 0)->first();
            $exam_test_on_student->start_date_time = date('Y-m-d H:i:s');
            $exam_test_on_student->finishing_date_time = date('Y-m-d H:i:s', strtotime("+".$exam_test_on_student->exam->time_limit_minutes." minute"));
            $exam_test_on_student->save();

            $time = $exam_test_on_student['finishing_date_time'];
        }

        return view('test_student.exams_test', [
            'nomer' => $request->input('nomer'),
            'student' => $student,
            'subject' => $exam_test->exam->subject,
            'direction' => $exam_test->exam->direction,
            'seconds' => abs(strtotime($time) - strtotime(date("Y-m-d H:i:s"))),
            'exams' => ExamTestOnStudentModel::with('question_exam.variants', 'question_exam_disabled')->where('student_id', '=', $student->id)->where('status', '=', 0)->first()
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
}
