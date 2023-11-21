<?php

namespace App\Http\Controllers\Supervisors;

use App\Http\Controllers\Controller;
use App\Models\NBTestOnStudentModel;
use App\Models\NbTestOnStudentRepeatModel;
use App\Models\NBTestQuestionModel;
use App\Models\NBTestOnStudentQuestionModel;
use App\Models\NBTestAnswerModel;
use App\Models\NBTestOnStudentAnswerModel;
use App\Models\NBTestStudentComparisonLeftBlockModel;
use App\Models\NBTestStudentComparisonRightBlockModel;
use App\Models\NBTestStudentComparisonModel;
use App\Models\NBTestThemeModel;
use App\Models\ThemeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorNB extends Controller
{

    public function test_generate(Request $request)
    {
            $test_on_students = NBTestOnStudentModel::where('mb_test_theme_id',  '=', 2131)->get();

            foreach ($test_on_students as $test_on_student){

                NbTestOnStudentRepeatModel::create([
                    'nb_test_on_student_id' => $test_on_student->id
                ]);

                foreach (NBTestQuestionModel::where('mb_test_theme_id', '=', 2131)->where('type', '!=', 'writing')->where('delete_status', '=', 0)->get() as $value) {
                    $test_question_model = NBTestOnStudentQuestionModel::create([
                        'mb_test_on_student_id' => $test_on_student['id'],
                        'mb_test_question_id' => $value['id'],
                        'question' => $value['question'],
                        'type' => $value['type'],
                        'waiting_seconds' => $value['waiting_seconds'],
                    ]);

    //      отключения письменных тестов      if ($test_question_model['type'] == "variant" || $test_question_model['type'] == "writing") {
                    if ($test_question_model['type'] == "variant") {
                        foreach (NBTestAnswerModel::where('mb_test_question_id', '=', $value['id'])->where('delete_status', '=', 0)->get()->shuffle() as $value1) {
                            NBTestOnStudentAnswerModel::create([
                                'variant' => $value1['variant'],
                                'writing' => $value1['writing'],
                                'correct' => $value1['correct'],
                                'mb_test_on_stu_ques_id' => $test_question_model['id']
                            ]);
                        }
                    } else if ($test_question_model['type'] == "writing") {

                        $value = NBTestAnswerModel::where('mb_test_question_id', '=', $value['id'])->first();

                        NBTestOnStudentAnswerModel::create([
                            'variant' => $value['variant'],
                            'writing' => $value['writing'],
                            'correct_student' => 1,
                            'mb_test_on_stu_ques_id' => $test_question_model['id']
                        ]);
                    } else if ($test_question_model['type'] == "comparison") {

                        foreach (NBTestQuestionModel::where('id', '=', $value['id'])->first()->comparisons->where('delete_status', '=', 0)->shuffle() as $value) {

                            $block_left = NBTestStudentComparisonLeftBlockModel::create([
                                'name' => $value->block_left->name,
                                'mb_t_o_q_id' => $test_question_model['id']
                            ]);

                            $block_right = NBTestStudentComparisonRightBlockModel::create([
                                'name' => $value->block_right->name,
                                'mb_t_o_q_id' => $test_question_model['id']
                            ]);

                            $comparison = NBTestStudentComparisonModel::create([
                                'st_block_left_id' => $block_left['id'],
                                'st_block_right_id' => $block_right['id'],
                                "mb_test_on_student_qt_id" => $test_question_model['id']
                            ]);
                        }
                    }
                }

            }


        return response()->json([
            'status' => '1'
        ]);
    }

    public function add_mb_on_student(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                foreach ($request->input('students') as $key) {
                    $test_on_student = NBTestOnStudentModel::create([
                        'student_id' => $key['id'],
                        'pair' => $request->input('pair'),
                        'date' => $request->input('date'),
                        'end_date_time' => date('Y-m-d H:i:s', strtotime($request->input('date')."+ 7 day")),
                        'teacher_id' => NBTestThemeModel::with(['theme'])->where('id', '=', $request->input('theme_id'))->first()->theme->teacher_id,
                        'subject_id' => NBTestThemeModel::with(['theme'])->where('id', '=', $request->input('theme_id'))->first()->theme->subject_id,
                        'semester_id' => $request->input('semester_id'),
                        'direction_id' => NBTestThemeModel::with(['theme'])->where('id', '=', $request->input('theme_id'))->first()->theme->direction_id,
                        'mb_test_theme_id' => $request->input('theme_id'),
                        'question_count' => NBTestQuestionModel::where('mb_test_theme_id', '=', $request->input('theme_id'))->where('type', '!=', 'writing')->count(),
                        'supervisor_question_count' => NBTestQuestionModel::where('mb_test_theme_id', '=', $request->input('theme_id'))->count(),
                        'supervisor_id' => $request->user()->id
                    ]);

                    NbTestOnStudentRepeatModel::create([
                        'nb_test_on_student_id' => $test_on_student->id,
                        'date' => date('Y-m-d')
                    ]);

                    foreach (NBTestQuestionModel::where('mb_test_theme_id', '=', $request->input('theme_id'))->where('type', '!=', 'writing')->where('delete_status', '=', 0)->get() as $value) {
                        $test_question_model = NBTestOnStudentQuestionModel::create([
                            'mb_test_on_student_id' => $test_on_student['id'],
                            'mb_test_question_id' => $value['id'],
                            'question' => $value['question'],
                            'type' => $value['type'],
                            'waiting_seconds' => $value['waiting_seconds'],
                        ]);

//      отключения письменных тестов      if ($test_question_model['type'] == "variant" || $test_question_model['type'] == "writing") {
                        if ($test_question_model['type'] == "variant") {
                            foreach (NBTestAnswerModel::where('mb_test_question_id', '=', $value['id'])->where('delete_status', '=', 0)->get()->shuffle() as $value1) {
                                NBTestOnStudentAnswerModel::create([
                                    'variant' => $value1['variant'],
                                    'writing' => $value1['writing'],
                                    'correct' => $value1['correct'],
                                    'mb_test_on_stu_ques_id' => $test_question_model['id']
                                ]);
                            }
                        } else if ($test_question_model['type'] == "writing") {

                            $value = NBTestAnswerModel::where('mb_test_question_id', '=', $value['id'])->first();

                            NBTestOnStudentAnswerModel::create([
                                'variant' => $value['variant'],
                                'writing' => $value['writing'],
                                'correct_student' => 1,
                                'mb_test_on_stu_ques_id' => $test_question_model['id']
                            ]);
                        } else if ($test_question_model['type'] == "comparison") {

                            foreach (NBTestQuestionModel::where('id', '=', $value['id'])->first()->comparisons->where('delete_status', '=', 0)->shuffle() as $value) {

                                $block_left = NBTestStudentComparisonLeftBlockModel::create([
                                    'name' => $value->block_left->name,
                                    'mb_t_o_q_id' => $test_question_model['id']
                                ]);

                                $block_right = NBTestStudentComparisonRightBlockModel::create([
                                    'name' => $value->block_right->name,
                                    'mb_t_o_q_id' => $test_question_model['id']
                                ]);

                                $comparison = NBTestStudentComparisonModel::create([
                                    'st_block_left_id' => $block_left['id'],
                                    'st_block_right_id' => $block_right['id'],
                                    "mb_test_on_student_qt_id" => $test_question_model['id']
                                ]);
                            }
                        }
                    }
                }
            });
        } catch (\Exception $e){

            throw new \Exception($e->getMessage());
        }

        return response()->json([
            'status' => '1'
        ]);
    }
}
