<?php

namespace App\Http\Controllers\Deans\Connect_groups;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Domain\Directions\Models\Direction;
use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\StudentCourses\Models\StudentCourse;

class ConnectGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::get();
        $student_courses = StudentCourse::get();
        $user = Auth::user()->id;
        $supervisors = User::where('level_id', '=', 5)->get();
        // dd($lang);
        return view('deans(dekan).group_connect.create', compact('languages', 'student_courses', 'user', 'supervisors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = (count($request->group_akademik_year));
        //    dd($request->group_akademik_year["0"]);
        foreach ($request->group_akademik_year as $key => $value) {
            // dd($value);
            DeanGroup::where('id', '=', $value)->update(['supervisor_id' => $request->supervisor_id]);
        }
        session()->flash('success', "Nazoratchiga $count ta guruh biriktirildi !");
        return redirect()->route('deans_connect_group.create');

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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDirectionSupervisor(Request $request)
    {
        if ($request->input('type_of_education_id') == 1) {
            $dean_groups = Direction::query()
                ->where('dean_id', '=', $request->user)
                ->where('type_of_education_id', '=', 1)
                ->get();
        }
        if ($request->input('type_of_education_id') == 2) {
            $dean_groups = Direction::query()
                ->where('dean_id', '=', $request->user)
                ->where('type_of_education_id', '=', 2)
                ->get();
        }
        if ($request->input('type_of_education_id') == 3) {
            $dean_groups = Direction::query()
                ->where('dean_id', '=', $request->user)
                ->where('form_of_education_id', '=', 3)
                ->get();
        }

        return response()->json([
            'direction' => $dean_groups,
        ]);
    }

    public function connect_direction(Request $request)
    {

        if ($request->type_of_education_id == 1) {
            $groups = DeanGroup::query()
                ->with('get_direction_id')
                ->where('form_of_education_id', '=', 1)
                ->where('type_of_education_id', '=', 1)
//                ->where('dean_id', '=', $request->input('user'))
                ->where('language_id', '=', $request->input('language_id'))
                ->groupBy('direction_id')
                ->get();
        } if ($request->type_of_education_id == 2) {
        $groups = DeanGroup::query()
            ->with('get_direction_id')
            ->where('form_of_education_id', '=', 1)
            ->where('type_of_education_id', '=', 2)
//            ->where('dean_id', '=', $request->input('user'))
            ->where('language_id', '=', $request->input('language_id'))
            ->groupBy('direction_id')
            ->get();
    } if ($request->type_of_education_id == 3) {
        $groups = DeanGroup::query()
            ->with('get_direction_id')
            ->where('form_of_education_id', '=', 2)
//            ->where('dean_id', '=', $request->input('user'))
            ->where('language_id', '=', $request->input('language_id'))
            ->groupBy('direction_id')
            ->get();
    }
        if($request->type_of_education_id == 4){
            $groups = DeanGroup::query()
                ->with('get_direction_id')
                ->where('form_of_education_id', '=', 1)
                ->where('type_of_education_id', '=', 4)
//                ->where('dean_id', '=', $request->input('user'))
                ->where('language_id', '=', $request->input('language_id'))
                ->groupBy('direction_id')
                ->get();
        }

//
//        if ($request->input('type_of_education_id') == 1) {
////            $form = 1;
//            $dean_groups = Direction::where('form_of_education_id', '=', 1)
//                ->where('dean_id', '=', $request->input('user'))
//                ->where('language_id', '=', $request->input('language_id'))
//                ->where('type_of_education_id','=',1)
//                ->get();
//
//        }
//
//        if ($request->input('type_of_education_id') == 2) {
////            $form = 1;
//            $dean_groups = Direction::where('form_of_education_id', '=', 1)->where('dean_id', '=', $request->input('user'))
//                ->where('language_id', '=', $request->input('language_id'))->where('type_of_education_id','=',2)
//
//                ->get();
//
//        }
//        if ($request->input('type_of_education_id') == 3) {
//
////            $form = 2;
//            $dean_groups = Direction::where('form_of_education_id', '=', 2)->where('dean_id', '=', $request->input('user'))
//                ->where('language_id', '=', $request->input('language_id'))->get();
//
//        }
//        $dean_groups = Direction::where('form_of_education_id', '=', $form)->where('dean_id', '=', $request->input('user'))
//            ->where('language_id', '=', $request->input('language_id'))
//
//            ->get();

        // $languages = $dean_groups->get_language;
        // $type = $dean_groups->get_type_of_education_id;
        // $form = $dean_groups->get_form_of_education_id;
        // $direction = $dean_groups->get_direction_id;
        // $course = $dean_groups->get_group_course_id;
        return response()->json([
            'direction' => $groups,
        ]);
    }

    public function connect_groups(Request $request)
    {
        if ($request->input('type_of_education_id') == 1) {
//            $type = 1;
            $dean_groups = User::query()
                ->with(['dean_group', 'direction'])
                ->where('direction_id', '=', $request->direction_id)
                ->where('level_id', '=', 4)
                ->where('type_of_education_id', '=', 1)
                ->where('form_of_education_id', '=', 1)
                ->where('student_course_id', '=', $request->group_course_id)
                ->groupBy('group_id')
                ->get();
        }

        if ($request->input('type_of_education_id') == 2) {
//            $type = 2;
            $dean_groups = User::query()
                ->with(['dean_group', 'direction'])
                ->where('direction_id', '=', $request->direction_id)
                ->where('level_id', '=', 4)
                ->where('type_of_education_id', '=', 2)
                ->where('form_of_education_id', '=', 1)
                ->where('old_course', '=', $request->group_course_id)
                ->groupBy('group_id')
                ->get();
        }
        if ($request->input('type_of_education_id') == 3) {
//            $type = 1;
            $dean_groups = User::query()
                ->with(['dean_group', 'direction'])
                ->where('direction_id', '=', $request->direction_id)
                ->where('level_id', '=', 4)
                ->where('form_of_education_id', '=', 2)
                ->where('student_course_id', '=', $request->group_course_id)
                ->groupBy('group_id')
                ->get();
        }
        if ($request->input('type_of_education_id') == 4) {
//            $type = 1;
            $dean_groups = User::query()
                ->with(['dean_group', 'direction'])
                ->where('direction_id', '=', $request->direction_id)
                ->where('level_id', '=', 4)
                ->where('type_of_education_id', '=', 4)
                ->where('form_of_education_id', '=', 2)
                ->where('student_course_id', '=', $request->group_course_id)
                ->groupBy('group_id')
                ->get();
        }

//        $dean_groups = DeanGroup::where('type_of_education_id', '=', $type)
//            ->where('language_id', '=', $request->input('language_id'))
//            ->where('direction_id', '=', $request->input('direction_id'))
//            ->where('group_course_id', '=', $request->input('group_course_id'))
//            ->where('supervisor_id', '=', 0)
//            ->get();


        return response()->json([
            'direction' => $dean_groups,
        ]);
    }

    public function get_statistika()
    {
        return view('deans(dekan).statistic.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkGroupFilter(Request $request)
    {
        if ($request->check == 1) {
            $groups = DeanGroup::query()
                ->with(['get_language', 'get_type_of_education_id', 'get_form_of_education_id', 'get_direction_id', 'get_group_course_id'])
                ->where('supervisor_id', '=', 0)
                ->get();
        } elseif ($request->check == 2) {
            $groups = DeanGroup::query()
                ->with(['get_language', 'get_type_of_education_id', 'get_form_of_education_id', 'get_direction_id', 'get_group_course_id', 'get_supervisor'])
                ->where('supervisor_id', '!=', 0)
                ->get();
        }

        return response()
            ->json([
                'status' => true,
                'data' => $groups
            ]);
    }
}
