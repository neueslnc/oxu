<?php

namespace App\Http\Controllers\Super;

use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\DepartamentModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserRequestCreate;
use App\Http\Requests\User\UserRequestUpdate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', ['users' => User::with('departament')->where('level_id','=',2)->Orwhere('level_id','=',3)->paginate(7) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', ['user_levels' => UserLevel::whereIn('id', array(2, 3))->get(), 'departaments' => DepartamentModel::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequestCreate $request)
    {
        $request['password'] = Hash::make($request['password']);
        
        User::create($request->all());

        return redirect()->route('superadmin.user.index');
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
        $user=User::find($id);
    
        return view('user.edit', ['user_levels' => UserLevel::whereIn('id', array(2, 3))->get(), 'departaments' => DepartamentModel::all()],compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequestUpdate $request, $id)
    {
        
        $number ="998"."$request->number_phone";
        
        User::where('id','=',$id)->update(['full_name'=>$request->full_name,
        'level_id'=>$request->level_id,'departament_id'=>$request->departament_id,'number_phone'=>$number]);
        return redirect()->route('superadmin.user.index');
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
