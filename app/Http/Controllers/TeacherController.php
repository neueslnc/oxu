<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\TeacherOnSubject;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Teacher\TeacherRequestCreate;
use App\Http\Requests\Teacher\TeacherRequestUpdate;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $departament_id = $request->user()->departament_id;

        return view('teacher.index',
            ['teachers' => User::where('level_id', '=', 3)->where('departament_id', '=', $departament_id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('teacher.create', ['subjects' => Subject::where('departament_id', '=', $request->user()->departament_id )->get() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequestCreate $request)
    {
        $data = $request->only(
            [
                'full_name',
                'login',
                'departament_id',
                'password'
            ]
        );

        $data['password'] = Hash::make($data['password']);

        $data['level_id'] = 3;

        $user = User::create($data);

        foreach ($request->input('subjects') as $key => $value) {

            TeacherOnSubject::create(
                [
                    'user_id' => $user->id,
                    'subject_id' => $value
                ]
            );
        }

        return redirect()->route('teacher.index');
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
    public function edit($id)
    {
        $teacher_edits=User::where('id', '=', $id)->first();
        $subject_selecteds=TeacherOnSubject::where('user_id',$id)->get();
        $subjects=Subject::all();
        return view('teacher.create',compact('teacher_edits','subjects','subject_selecteds'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequestUpdate $request, string $id)
    {

        $data = $request->only(
            [
                'full_name',
                'login',
                'password'
            ]
        );

        $data['password'] = Hash::make($data['password']);

        $data['level_id'] = 3;

        $user = User::where('id','=',$id)->update($data);

        $subject_selecteds=TeacherOnSubject::where('user_id',$id)->delete();

        foreach ($request->input('subjects') as $key => $value) {

            TeacherOnSubject::create(
                [
                    'user_id' => $id,
                    'subject_id' => $value
                ]
            );
        }

        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
