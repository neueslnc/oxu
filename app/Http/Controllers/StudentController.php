<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StudentRequestCreate;
use App\Models\Sex;
use App\Models\StudentGroup;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('student.index', ['all' => User::where('level_id', '=', 4)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', ['groups' => StudentGroup::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequestCreate $request)
    {
        $request['password'] = Hash::make($request['password']);

        $request['level_id'] = 4;

        $request['remember_token']=$request->_token;

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $request->file('image')->storeAs('public/student_img',$fileNameToStore);

        $request['img_path'] = "storage/student_img/".$fileNameToStore;

        User::create($request->all());

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('sd');
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


//    STUDENTS ROLE START
    /**
     * @return Application|Factory|View
     */
    public function students()
    {
        return view('students.index');
    }

    public function example()
    {
        return view('students.examples.index');
    }

    public function exams()
    {
        return view('students.exams.index');
    }
//    STUDENTS ROLE END

    public function check()
    {
        dd('sd');
    }

//    DEAN ROLE START
    public function getSexCount()
    {
        return view('deans(dekan).students.sex',[
            'sexes' => Sex::query()->get(),
            'students' => User::query()->select('sex_id')->get()
        ]);
    }
//    DEAN ROLE END
}
