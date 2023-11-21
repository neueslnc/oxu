<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentGroup\StudentGroupCreateRequest;
use App\Jobs\ProcessPodcast;
use App\Models\StudentGroup as ModelsStudentGroup;
use Illuminate\Http\Request;

class StudentGroup extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student_group.index', ['all' => ModelsStudentGroup::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentGroupCreateRequest $request)
    {
        ModelsStudentGroup::create($request->all());

        return redirect()->route('student_group.index');
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

    public function import_xlsx(Request $request)
    {
        $path1 = $request->file('file_xlsx')->store('temp');

        $path = storage_path('app').'/'.$path1;

        ProcessPodcast::dispatch($path);

        return redirect()->route('student_group.index');
    }
    public function index_admin()
    {
        return view('student_group.index_admin', ['all' => ModelsStudentGroup::all()]);
    }

}
