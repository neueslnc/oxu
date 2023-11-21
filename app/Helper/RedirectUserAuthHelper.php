<?php

namespace App\Helper;

use App\Models\StudentGroup;
use Illuminate\Http\Request;

class RedirectUserAuthHelper
{

    static public function hasDefaultRouteRole(Request $request)
    {

        switch ($request->user()->user_level->name) {
            case 'super_admin':
            case 'admin':
            case 'teacher':
            case 'student':
            case 'supervisor':
            case 'dean':
            case 'rektor':
            case 'supervisor_exams':
            case 'booker':
            case 'nb_controller':
                return true;
                break;
        }
    }

    static public function redirectDefaultRole(Request $request)
    {

        if ($request->user()->hasRole("super_admin")) {

            return redirect()->route('superadmin.departament.index');
        } else if ($request->user()->hasRole("admin")) {

            return redirect()->route('admin.main.index', ["all" => StudentGroup::all()]);
        } else if ($request->user()->hasRole("teacher")) {

            return redirect()->route('test_theme.index');
        } else if ($request->user()->hasRole("student")) {

            return redirect()->route('students.index');
        } else if ($request->user()->hasRole("supervisor")) {

            return redirect()->route('test_nb.index');
        } else if ($request->user()->hasRole("dean")) {

            return redirect()->route('dean.homepage');
        } else if ($request->user()->hasRole("supervisor_exams")) {

            return redirect()->route('supervisor_exams.exam.index');
        } else if ($request->user()->hasRole("rektor")) {

            return redirect()->route('reports.test');
        } else if ($request->user()->hasRole("booker")) {

            return redirect()->route('booker.students.index');
        } else if ($request->user()->hasRole("nb_controller")) {

            return redirect()->route('test_nb.index');
        }
    }
}
