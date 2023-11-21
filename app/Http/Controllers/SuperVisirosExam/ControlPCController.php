<?php

namespace App\Http\Controllers\SuperVisirosExam;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperVisirosExam\ContorlPC\ControlPCCreate;
use App\Models\ExamsContorlPC;
use Illuminate\Http\Request;

class ControlPCController extends Controller
{
    public function index()
    {
        return view('supervisions_exam.control_pc.index', ['pcs' => ExamsContorlPC::all() ]);
    }

    public function create()
    {
        return view('supervisions_exam.control_pc.create');
    }

    public function store(ControlPCCreate $request){

        ExamsContorlPC::create($request->all());

        return redirect()->route('supervisor_exams.control_pc.index');
    }

    public function edit($id)
    {

        return view('supervisions_exam.control_pc.create', ['control_pc' => ExamsContorlPC::find($id)]);
    }
    
    public function update(ControlPCCreate $request, string $id)
    {

        ExamsContorlPC::find($id)->update($request->all());
        
        return redirect()->route('supervisions_exam.control_pc.index');
    }
}
