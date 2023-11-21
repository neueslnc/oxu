<?php

namespace App\Http\Controllers\Supervisors;

use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DeanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supervisors.dean_group.index');
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
        $students = User::withCount(['get_nb'])->with([
            'dean_group',
            'dean_group.get_group_akademik_year',
            'language',
            'type_of_education',
            'form_of_education',
            'direction',
            'student_course'])->where('group_id', '=', $id)->get();

        $dean = DeanGroup::where('id', '=', $id)->first();

        return view('supervisors.dean_group.show', [
            'students' => $students,
            'dean_id' => $dean->id,
            'direction_id' => $dean->direction_id
        ]);
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
