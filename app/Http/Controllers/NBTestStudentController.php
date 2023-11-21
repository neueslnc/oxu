<?php

namespace App\Http\Controllers;

use App\Models\NBTestOnStudentModel;
use App\Models\User;
use Illuminate\Http\Request;

class NBTestStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dd(NBTestOnStudentModel::where('student_id', '=', $request->session()->get('student')->id)->where('status', '=', 0)->first()->test_on_student_questions->with('test_on_student_answers'));


        return view('nb_test_student.index',[
            'student' => User::where('student_id', '=', $request->session()->get('student')->id)->first(),
            'direction' => NBTestOnStudentModel::where('student_id', '=', $request->session()->get('student')->id)->where('status', '=', 0)->first(),
            'subject' => NBTestOnStudentModel::where('student_id', '=', $request->session()->get('student')->id)->where('status', '=', 0)->first()->subject,
            'test' => NBTestOnStudentModel::where('student_id', '=', $request->session()->get('student')->id)->where('status', '=', 0)->first()->test_on_student_question,
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
