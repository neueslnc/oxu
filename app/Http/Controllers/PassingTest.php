<?php

namespace App\Http\Controllers;

use App\Models\NBTestOnStudentAnswerModel;
use Illuminate\Http\Request;
use App\Models\NBTestOnStudentModel;
use App\Models\NBTestOnStudentQuestionModel;

class PassingTest extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($key)
    {        
        $data = NBTestOnStudentModel::withCount(['test_on_student_questions', 'test_on_student_questions_active'])->with(['test_on_student_question' => function ($query) {
            $query->get([
                'mb_test_on_student_id',
                'mb_test_question_id',
                'type',
                'question',
                'type',
                'waiting_seconds'
            ]);
            $query->with(['test_on_student_answers' => function ($query) {
                $query->select([
                    'id',
                    'variant',
                    'writing',
                    'correct_student',
                    'mb_test_on_student_question_id'
                ]);
            }]);
        }])->where('access_key', '=', $key)->first();

        // dd($data);

        return view('test_student.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        NBTestOnStudentQuestionModel::where('id', '=', $request->id)->update([
            'status' => 1
        ]);

        $question = NBTestOnStudentQuestionModel::where('id', '=', $request->id)->first();

        foreach ($request->data as $key => $value) {

            if ($question->type == 'variant') {
                
                NBTestOnStudentAnswerModel::where('id', '=', $value['id'])->update([
                    'correct_student' => $value['correct_student'] == "true" ? 1 : 0
                ]);
            }elseif ($question->type == 'writing') {
                
                NBTestOnStudentAnswerModel::where('id', '=', $value['id'])->update([
                    'writing_student' => $value['correct_student']
                ]);
            }

        }

        $data = NBTestOnStudentModel::withCount(['test_on_student_questions', 'test_on_student_questions_active'])->where('access_key', '=', $request->key)->first();

        if(($data['test_on_student_questions_count'] - $data['test_on_student_questions_active_count']) == 0 ) {
            
            $data['status'] = 1;

            $data->save();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
