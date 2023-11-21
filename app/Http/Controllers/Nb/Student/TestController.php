<?php

namespace App\Http\Controllers\Nb\Student;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Directions\Models\Direction;
use App\Http\Controllers\Controller;
use App\Models\ExamTestOnStudentModel;
use App\Models\NBTestComparisonLeftBlockModel;
use App\Models\NBTestComparisonRightBlockModel;
use App\Models\NBTestOnStudentAnswerModel;
use App\Models\NBTestOnStudentModel;
use App\Models\NBTestOnStudentQuestionModel;
use App\Models\NbTestOnStudentRepeatModel;
use App\Models\NBTestQuestionModel;
use App\Models\NBTestStudentComparisonLeftBlockModel;
use App\Models\NBTestStudentComparisonModel;
use App\Models\NBTestStudentComparisonRightBlockModel;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class TestController extends Controller
{
    protected $limit = 5;

    public function nb_test_list (Request $request){

        $nb_list = NBTestOnStudentModel::withCount([
            'get_latest_repeat',
            'get_latest_repeat_pro',
            'test_on_student_questions',
            'test_on_student_questions_active'
        ])->with([
            'direction',
            'supervisor',
            'teacher',
            'subject',
            'mb_test_theme.theme',
            'test.theme'
        ])->where('student_id', '=', $request->session()->get('student')->id)->orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->get();

        $student = User::with('dean_group')->where('id', '=', $request->session()->get('student')->id)->first();

        return view('nb.student.list', ['nb_lists' => $nb_list, 'student' => $student]);
    }

    public function index (Request $request){

        $nb_test_on_students = NBTestOnStudentModel::withCount([
            'test_on_student_questions',
            'test_on_student_questions_active'
        ])->with([
            'student.dean_group',
            'test_on_student_question.test_on_student_answers',
            'test_on_student_question.block_lefts',
            'test_on_student_question.block_rights'
            ])->where('student_id', '=', $request->session()->get('student')->id)
            ->where('id', '=', $request->input('id'))
            ->where('status', '=', 0)->first();

//        dd($nb_test_on_students);

        if ($nb_test_on_students == null){

            return redirect()->route('nb_student_login');
        }

        if ($nb_test_on_students->start_date_time == null ){
            $get_latest_repeat = NBTestOnStudentModel::where('student_id', '=', $request->session()->get('student')->id)->where('status', '=', 0)->first()->get_latest_repeat;
            $get_latest_repeat->start_date_time = date('Y-m-d H:i:s');
            $get_latest_repeat->save();
        }

        return view('nb.student.index', [
            'direction' => $nb_test_on_students->direction,
            'subject' =>  $nb_test_on_students->subject,
            'student' => $nb_test_on_students->student,
            'test' => $nb_test_on_students->test_on_student_question,
            'block_lefts' => $nb_test_on_students->block_lefts,
            'block_rights' => $nb_test_on_students->block_rights,
            'test_id' => $nb_test_on_students->id,
            'count_question' => $nb_test_on_students->test_on_student_questions_count,
            'active_question' => $nb_test_on_students->test_on_student_questions_active_count,
        ]);
    }

    public function set_variant(Request $request)
    {

        if (NBTestOnStudentModel::where('id', '=', $request->input('test_id'))->where('status', '=', 1)->first()) {

            $exam_result = NBTestOnStudentModel::where('id', '=', $request->input('test_id'))->where('status', '=', 1)->first();

            return response()
                ->json([
                    'status' => "success_full",
                    'supervisor_question_count' => $exam_result->supervisor_question_count,
                    'supervisor_question_success' => $exam_result->supervisor_question_success,
                    'supervisor_question_rejerect' => $exam_result->supervisor_question_rejerect,
                    'ball' => $exam_result->ball
                ]);
        }else{

            DB::beginTransaction();

            try {

                $nb = NBTestOnStudentModel::with(['test_on_student_questions.test_on_student_answers'])->where('id', '=', $request->input('test_id'))->first();

                $test_on_student_question = $nb->test_on_student_questions->where('id', '=', $request->input('question_id'))->first();

                $test_on_student_question->status = 1;

                $test_on_student_question->save();

                $test_on_student_answers = $test_on_student_question->test_on_student_answers->where('id', '=', $request->input('variant_id'))->first();

                if ($test_on_student_question->type == "variant") {

                    $test_on_student_answers->correct_student = 1;
                    $test_on_student_answers->save();
                }elseif ($test_on_student_question->type == "writing") {

                    $test_on_student_answers->correct_student = $request->input('answer');
                }elseif ($test_on_student_question->type == "comparison") {

                    // $test_on_student_answers->correct_student = $request->input('answer');

                    $true_comparison = 0;

                    $studen_data_comparisons = [];

                    foreach ($request->input('comparisons') as $item) {

                        $block_left = NBTestStudentComparisonLeftBlockModel::where('id', '=', $item['block_left'])->first();

                        $block_right = NBTestStudentComparisonRightBlockModel::where('id', '=', $item['block_right'])->first();

                        array_push($studen_data_comparisons,[
                            'block_left' => [
                                'id' => $block_left['id'],
                                'name' => $block_left['name']
                            ],
                            'block_right' => [
                                'id' => $block_right['id'],
                                'name' => $block_right['name']
                            ]
                        ]);

                        if (
                            !empty(NBTestStudentComparisonModel::where('st_block_left_id', '=', $item['block_left'])
                            ->where('st_block_right_id', '=', $item['block_right'])
                            ->where('mb_test_on_student_qt_id', '=', $request->input('question_id'))
                            ->first())
                        ) {
                            $true_comparison += 1;
                        }
                    }

                    $comparison_count = NBTestStudentComparisonModel::where('mb_test_on_student_qt_id', '=', $request->input('question_id'))->count();

                    $percent = ($true_comparison/$comparison_count)*100 ;

                    $answer = 0;

                    if ($percent >= 60) {
                        $answer = 1;
                    }else{
                        $answer = 0;
                    }

                    if (empty(NBTestOnStudentAnswerModel::where("mb_test_on_stu_ques_id", "=", $request->input('question_id'))->first())){

                        $answer = NBTestOnStudentAnswerModel::create([
                            "mb_test_on_stu_ques_id" => $request->input('question_id'),
                            "correct_student" => $answer
                        ]);
                    }

                    $test_on_student_question->comparisons_copy = json_encode($studen_data_comparisons);

                    $test_on_student_question->save();
                }

                if(NBTestOnStudentQuestionModel::where('mb_test_on_student_id', '=', $request->input('test_id'))->where('status', '=', 0)->count() == 0 ){

                    $exam_result = \App\Models\NBTestOnStudentModel::withCount(['test_on_student_questions'])->with(['test_on_student_questions' => function ($query) {
                        $query->withCount(['awer']);
                    }])->where('id', '=', $request->input('test_id'))->first();


                    $answer_succes = 0;

                    foreach ($exam_result['test_on_student_questions'] as $item) {

                        $answer_succes += $item['awer_count'];
                    }

                    $ball = round(($answer_succes / $exam_result['test_on_student_questions_count']) * 100, 1);

                    $mb_student_repeat = $exam_result->get_latest_repeat;

                    $i = NBTestOnStudentModel::with(
                        'test_on_student_questions.test_on_student_answers',
                        'test_on_student_questions.comparisons',
                        'test_on_student_questions.comparisons.block_lefts',
                        'test_on_student_questions.comparisons.block_rights'
                    )->where('id', '=', $request->input('test_id'))->first()->test_on_student_questions;

                    $mb_student_repeat->question_success = $answer_succes;
                    $mb_student_repeat->question_rejerect = $exam_result->question_count - $answer_succes;
                    $mb_student_repeat->end_date_time = date('Y-m-d H:i:s');
                    $mb_student_repeat->copy_question = json_encode($i);
                    $mb_student_repeat->ball = $ball;
                    $mb_student_repeat->save();


                    if ($ball >= 50){

                        $exam_result->status = 1;

                        $exam_result->save();
                    }else{

                        if ( $nb->end_date_time > date('Y-m-d 00:00:00') ){

                            NbTestOnStudentRepeatModel::create([
                                'nb_test_on_student_id' => $exam_result->id,
                                'date' => date('Y-m-d', strtotime(date('Y-m-d')."+ 1 day"))
                            ]);

                            foreach ($i as $item){

                                $item->status = 0;
                                $item->save();

                                foreach ($item->test_on_student_answers as $item1){
                                    if($item->type == 'variant'){
                                        $item1->correct_student = 0;
                                        $item1->save();
                                    }elseif ($item->type == 'comparison'){
                                        $item1->delete();
                                    }
                                }
                            }
                        }else{
                            $exam_result->status = 1;

                            $exam_result->save();
                        }
                    }

                    DB::commit();

                    return response()
                        ->json([
                            'status' => "success_full",
                            'supervisor_question_count' => $exam_result->supervisor_question_count,
                            'supervisor_question_success' => $mb_student_repeat->question_success,
                            'supervisor_question_rejerect' => $mb_student_repeat->question_rejerect,
                            'ball' => $ball
                        ]);
                }// TODO : добавить логику повторения

                $nb_test_on_student = NBTestOnStudentModel::with(
                    array(
                        'test_on_student_question.test_on_student_answers',
                        'test_on_student_question.block_lefts',
                        'test_on_student_question.block_rights')
                )->where('student_id', '=', $request->session()->get('student')->id)
                    ->where('status', '=', 0)
                    ->where('id', '=', $request->input('test_id'))
                    ->first()->test_on_student_question;

                DB::commit();

                return response()
                    ->json(array(
                        'status' => "success",
                        'test' => $nb_test_on_student
                    ));
            }catch (\Exception $exception) {
                DB::rollBack();
                throw $exception;
            }
        }
    }
}
