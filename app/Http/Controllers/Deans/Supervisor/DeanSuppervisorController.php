<?php

namespace App\Http\Controllers\Deans\Supervisor;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Directions\Models\Direction;
use App\Models\DirectionOnSupervisorModel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Deans\Supervisor\SupervisorRequest;

class DeanSuppervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supervisors = User::query()
            ->with(['dean_group_supervisor'])
            ->where('level_id', '=', 5)
            ->paginate(20);

        $directions = Direction::where('dean_id', '=', $request->user()->id)->get();

        $dean_groups = DeanGroup::all();

        return view('deans(dekan).supervisor_dean.index', compact('supervisors', 'directions', 'dean_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deans(dekan).supervisor_dean.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorRequest $request)
    {

        // dd($request->add_time);
        $request['add_time']=$request->add_time;
        $request['password'] = Hash::make($request['password']);
        $request['level_id'] = 5;
        User::create($request->all());

        return redirect()->route('deans_supervisor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateSupervisorGroup(Request $request): JsonResponse
    {

        foreach ($request->input('dean_groups') as $item){

            $group = DeanGroup::where('id', '=', $item['id'])->first();

            $group->supervisor_id = $item['supervisor_id'];

            $group->save();
        }

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function updateSupervisorDirection(Request $request)
    {

        $direction_on_supervisor = DirectionOnSupervisorModel::where('superviosr_id', '=', $request->input('user_id'))
            ->where('direction_id', '=', $request->input('direction_id'))
            ->first();

        if (empty($direction_on_supervisor)){

            DirectionOnSupervisorModel::create([
                'superviosr_id' => $request->input('user_id'),
                'direction_id' => $request->input('direction_id'),
            ]);
        }else{

            $direction_on_supervisor->status = $request->input('status');

            $direction_on_supervisor->save();
        }

        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor = User::where('id', '=', $id)->first();
        return view('deans(dekan).supervisor_dean.edit', compact('id', 'supervisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorRequest $request, $id)
    {
    //   dd(1);
        $request['password'] = Hash::make($request['password']);
        $supervisor = User::where('id', '=', $id)->update(['full_name' => $request->full_name, 'login' => $request->login, 'password' => $request['password'],'add_time'=>$request->add_time]);
        return redirect()->route('deans_supervisor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', '=', $id)->delete();
        return redirect()->route('deans_supervisor.index');

    }
}
