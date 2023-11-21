<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\SubjectRequestCreate;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller


{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('subject.index', ['subjects' => Subject::where('departament_id', '=', $request->user()->departament_id )->get() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequestCreate $request)
    {
        Subject::create($request->all());

        return redirect()->route('subject.index');
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
        $subject_edit=Subject::find($id);

        return view('subject.create',compact('subject_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Subject::where('id',$id)->update(['name'=>$request->name]);
        
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
