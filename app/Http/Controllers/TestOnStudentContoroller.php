<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NBTestAnswerModel;
use App\Models\NBTestQuestionModel;
use App\Models\NBTestOnStudentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NBTestOnStudentAnswerModel;
use App\Models\NBTestOnStudentQuestionModel;
use App\Models\NBTestStudentComparisonModel;
use App\Http\Requests\TestOnStudentCreateRequest;
use App\Models\NBTestStudentComparisonLeftBlockModel;
use App\Models\NBTestStudentComparisonRightBlockModel;

class TestOnStudentContoroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('test_on_student.index', ['all' => $request->user()->teacher_test_on_students()->where('status','=',0)->get() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('test_on_student.create', ['subjects' => $request->user()->teacher_subjects, 'students' => User::where('level_id', '=', 4)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestOnStudentCreateRequest $request)
    {
        $data = $request->all();

        $data['teacher_id'] = $request->user()->id;

        $data['access_key'] = uniqid();

        dd(Auth::user()->id);

        $data['supervisor_id'] = Auth::user()->id;

        $test_on_student = NBTestOnStudentModel::create($data);

        User::where('id', '=', $data['student_id'])->update([
            'mb_status' => 1
        ]);

        foreach (NBTestQuestionModel::where('mb_test_theme_id', '=', $data['mb_test_id'])->where('delete_status', '=', 0)->get() as $key => $value) {

            $test_question_model = NBTestOnStudentQuestionModel::create([
                'mb_test_on_student_id' => $test_on_student['id'],
                'mb_test_question_id' => $value['id'],
                'question' => $value['question'],
                'type' => $value['type'],
                'waiting_seconds' => $value['waiting_seconds'],
            ]);

            if ($test_question_model['type'] == "variant" || $test_question_model['type'] == "writing") {
                foreach (NBTestAnswerModel::where('mb_test_question_id', '=', $value['id'])->get() as $key1 => $value1) {
                    NBTestOnStudentAnswerModel::create([
                        'variant' => $value1['variant'],
                        'writing' => $value1['writing'],
                        'correct' => $value1['correct'],
                        'mb_test_on_stu_ques_id' => $test_question_model['id']
                    ]);
                }
            }else if($test_question_model['type'] == "comparison"){

                foreach ($test_question_model->comparisons as $key => $value) {

                    $block_left = NBTestStudentComparisonLeftBlockModel::create([
                        'name' => $value->block_left->name
                    ]);

                    $block_right = NBTestStudentComparisonRightBlockModel::create([
                        'name' => $value->block_right->name
                    ]);

                    $comparison = NBTestStudentComparisonModel::create([
                        'st_block_left_id' => $block_left['id'],
                        'st_block_right_id' => $block_right['id'],
                        "mb_test_on_student_qt_id" => $test_question_model['id']
                    ]);

                }
            }
        }

        return redirect()->route('test_on_student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $test_on_student)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $test_on_student)
    {
        $test=NBTestOnStudentModel::where('id','=',$test_on_student)->update(['status'=>1]);

        return redirect()->route('test_on_student.index');
    }
}
