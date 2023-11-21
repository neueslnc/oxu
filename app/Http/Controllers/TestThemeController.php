<?php

namespace App\Http\Controllers;

use App\Domain\Directions\Models\Direction;
use App\Http\Requests\Test\TestCreateRequest;
use App\Models\Subject;
use App\Models\NBTestAnswerModel;
use App\Models\NBTestComparisonLeftBlockModel;
use App\Models\NBTestComparisonModel;
use App\Models\NBTestComparisonRightBlockModel;
use App\Models\NBTestQuestionModel;
use App\Models\NBTestThemeModel;
use App\Models\TeacherOnSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('test_theme.index', [
            'test_themes' => $request->user()->teacher_tests()->with('theme')->where('status','=',0)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('test_theme.create', [
            'subjects' => $request->user()->teacher_subjects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestCreateRequest $request)
    {
        $theme = NBTestThemeModel::create([
            'theme_id' => $request->input('theme_id'),
            'user_id' => $request->user()->id,
            'subject_id' => $request->input('subject_id')
        ]);

        // dd($request->input('data'));

        foreach ($request->input('data') as $item) {

            if ($item['type'] == 'variant') {

                $question = NBTestQuestionModel::create([
                    "question" => $item['question_name'],
                    "type" => $item['type'],
                    "waiting_seconds" => $item['waiting_seconds'],
                    "mb_test_theme_id" => $theme->id
                ]);

                foreach ($item['variants'] as $item2) {
                    NBTestAnswerModel::create([
                        'variant' => $item2['name'],
                        'correct' => $item2['correct'] == 'true' ? 1 : 0,
                        'mb_test_question_id' => $question->id

                    ]);
                }
            }else if($item['type'] == 'writing') {

                $question = NBTestQuestionModel::create([
                    "question" => $item['data'],
                    "type" => $item['type'],
                    "mb_test_theme_id" => $theme->id
                ]);

                NBTestAnswerModel::create([
                    'writing' => $item['writing'],
                    'mb_test_question_id' => $question->id
                ]);
            }else if($item['type'] == 'comparison'){

                $question = NBTestQuestionModel::create([
                    "question" => $item['question_name'],
                    "type" => $item['type'],
                    "waiting_seconds" => $item['waiting_seconds'],
                    "mb_test_theme_id" => $theme->id
                ]);


                foreach ($item['comparisons'] as $comparison) {

                    $block_left = NBTestComparisonLeftBlockModel::create([
                        'name' => $comparison['block']['block_left']['name']
                    ]);

                    $block_right = NBTestComparisonRightBlockModel::create([
                        'name' => $comparison['block']['block_right']['name']
                    ]);

                    $nb_test_comparsion = NBTestComparisonModel::create([
                        "block_left_id" => $block_left->id,
                        "block_right_id" => $block_right->id,
                        "mb_test_question_id" => $question->id
                    ]);

                    $block_left->mb_test_question_id = $question['id'];
                    $block_right->mb_test_question_id = $question['id'];

                    $block_left->save();
                    $block_right->save();
                }
            }
        }

        return response()->json(['status' => 'success'], 200);
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
    public function edit(Request $request, string $id)
    {

        return view('test_theme.edit', ['theme_test' => NBTestThemeModel::with(['subject', 'theme.direction', 'questinos' => function ($query) {
            $query->with([
                'comparisons',
                'variants'
            ])->get();
        }])->where('id', '=', $id)->first()->toArray(), 'theme_id' => $id, 'theme_s_id' => NBTestThemeModel::where('id', '=', $id)->first()->theme_id, 'subject_id' => NBTestThemeModel::where('id', '=', $id)->first()->subject_id, 'subjects' => TeacherOnSubject::with(['subject'])->where('user_id', '=', $request->user()->id)->get() ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $theme = NBTestThemeModel::where('id', '=', $id)->update([
            'theme_id' => $request->input('theme_id'),
            'user_id' => $request->user()->id,
            'subject_id' => $request->input('subject_id')
        ]);

        $theme = NBTestThemeModel::where('id', '=', $id)->first();

        foreach ($request->input('data') as $item) {

            $item_id = $item['id'];

            if ($item['id'] != -1){
                NBTestQuestionModel::where('id', '=', $item['id'])->update([
                    "question" => $item['question_name'],
                    "type" => $item['type'],
                    "waiting_seconds" => $item['waiting_seconds'],
                    "delete_status" => $item['delete_status']
                ]);
            }else{
                $item_id = NBTestQuestionModel::create([
                    "question" => empty($item['data']) ? $item['question_name'] : $item['data'],
                    "type" => $item['type'],
                    "mb_test_theme_id" => $theme->id,
                    "waiting_seconds" => $item['waiting_seconds'],
                    "delete_status" => $item['delete_status']
                ])->id;
            }

            if ($item['type'] == 'variant') {


                foreach ($item['variants'] as $item2) {

                    if ($item2['id'] != -1){
                        NBTestAnswerModel::where('id', '=', $item2['id'])->update([
                            'variant' => $item2['name'],
                            'correct' => $item2['correct'] == 'true' ? 1 : 0,
                            "delete_status" => $item2['delete_status']
                        ]);
                    }else{
                        NBTestAnswerModel::create([
                            'variant' => $item2['name'],
                            'correct' => $item2['correct'] == 'true' ? 1 : 0,
                            "delete_status" => $item2['delete_status'],
                            'mb_test_question_id' => $item_id
                        ]);
                    }
                }
            }else if($item['type'] == 'writing') {

                if ($item['id'] != -1){

                    NBTestAnswerModel::where('mb_test_question_id', '=', $item['id'])->update([
                        'writing' => $item['writing']
                    ]);
                }else{

                    NBTestAnswerModel::create([
                        'writing' => $item['writing'],
                        'mb_test_question_id' => $item_id,
                    ]);
                }

            }else if($item['type'] == 'comparison'){

                foreach ($item['comparisons'] as $comparison) {

                    $block_left = '';
                    $block_right = '';

                    if($comparison['block']['block_left']['id'] != -1) {
                        NBTestComparisonLeftBlockModel::where('id', '=', $comparison['block']['block_left']['id'])->update([
                            'name' => $comparison['block']['block_left']['name']
                        ]);
                    } else {
                        $block_left = NBTestComparisonLeftBlockModel::create([
                            'name' => $comparison['block']['block_left']['name'],
                            'mb_test_question_id' => $item_id
                        ]);
                    }

                    if ($comparison['block']['block_right']['id'] != -1) {
                        NBTestComparisonRightBlockModel::where('id', '=', $comparison['block']['block_right']['id'])->update([
                            'name' => $comparison['block']['block_right']['name']
                        ]);
                    } else {
                        $block_right = NBTestComparisonRightBlockModel::create([
                            'name' => $comparison['block']['block_right']['name'],
                            'mb_test_question_id' => $item_id
                        ]);
                    }


                    if ($comparison['id'] != -1){

                        NBTestComparisonModel::where('id', '=', $comparison['id'] )->update([
                            'delete_status' => $comparison['delete_status']
                        ]);
                    }else{

                        $nb_test_comparsion = NBTestComparisonModel::create([
                            "block_left_id" => $block_left->id,
                            "block_right_id" => $block_right->id,
                            "mb_test_question_id" => $item_id
                        ]);
                    }
                }
            }
        }

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $nb=NBTestThemeModel::where('id',$id)->update(['status'=>1]);

        return redirect()->route('test_theme.index');

    }

    public function get_test_theme(Request $request){

        return response()->json(
            [
                'objects' => NBTestThemeModel::with('theme')->where('user_id', '=', $request->user()->id)->where('subject_id', '=', $request->input('subject_id') )->get()
            ]
            ,
             200);
    }

    public function get_test_direction(Request $request){

        if ($request->form_of_education_id==1) {
            $directions = DB::table('directions')
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',1)
//                ->groupBy('direction_id')
                ->get();
//            $directions=Direction::where('form_of_education_id','=',1)
//                ->where('type_of_education_id','=',1)
//                ->orderBy('id','desc')
//                ->get();
        }
        if ($request->form_of_education_id==2) {
            $directions = DB::table('directions')
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',2)
//                ->groupBy('direction_id')
                ->get();
//            $directions=Direction::where('form_of_education_id','=',1)
//                ->where('type_of_education_id','=',2)
//                ->orderBy('id','desc')
//                ->get();
        }
        if($request->form_of_education_id==3) {
            $directions=Direction::where('form_of_education_id','=',2)->orderBy('id','desc')->get();
        }
        if($request->form_of_education_id == 4){
            $directions = DB::table('directions')
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',4)
//                ->groupBy('direction_id')
                ->get();
        }


        return response()->json(
            [
                'objects' => $directions
            ]
            ,
            200);
    }
}
