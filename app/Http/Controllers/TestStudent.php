<?php

namespace App\Http\Controllers;

use App\Imports\TestStudent as ImportsTestStudent;
use App\Models\Exam;
use App\Models\ExamTestAnswerModel;
use App\Models\ExamTestQuestionModel;
use App\Models\ExamTestThemeModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TestStudent extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student_test.index', ['all' => ExamTestThemeModel::all()]);
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

    public function import_xlsx (Request $request){

        $data = Excel::toCollection(new ImportsTestStudent, $request->file('file_xlsx'));

        $exam_theme = ExamTestThemeModel::create([
            'name' => $request->input('name')
        ]);

        // dd($data);

        $regexp = '/^\s+$/';

        foreach ($data[0] as $key => $value) {

            if (strval($value[0]) != '') {

                $test_question = ExamTestQuestionModel::create([
                    'question' => $value[0],
                    'exam_id' => $exam_theme->id
                ]);
                
                for ($i = 1; $i < count($value); $i++) { 

                    if(strval($value[$i]) != ''){

                        $variant = $value[$i];
                        $correct = 0;

                        if(strripos($value[$i], '*') === 0 ){
                            $variant = str_replace('*', '', strval($value[$i]));
                            $correct = 1;
                        }
                        
                        ExamTestAnswerModel::create([
                            'variant' => $variant,
                            'correct' => $correct,
                            'test_question_id' => $test_question->{'id'}
                        ]);
                    }
                }
            }
        }

        return redirect()->route('student_test.index');
    }
}
