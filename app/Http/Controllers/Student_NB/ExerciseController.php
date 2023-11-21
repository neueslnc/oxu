<?php

namespace App\Http\Controllers\Student_NB;

use App\Http\Controllers\Controller;
use App\Models\NBTestOnStudentModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function loginStudentId()
    {
        return view('exercises.login');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $nbs = NBTestOnStudentModel::query()
            ->with('subject','teacher','mb_test_theme.theme')
            ->where('student_id','=',Auth::user()->id)
            ->get();
//        dd($nbs);
        return view('exercises.index', [
            'nbs' => $nbs
        ]);
    }

    /**
     * @param Request $req
     * @return RedirectResponse
     */
    public function login(Request $req)
    {
        $user = User::where('student_id', '=', $req->student_id)->first();
        if ($user != null) {
            if (!Auth::loginUsingId($user->id)) {
                return redirect()->back();
            } else {
                return redirect()->route('exercise.index');
            }
        } else {
            return redirect()->back()->with('error', 'Bunday foydalanuvchi mavjud emas.');
        }
    }
}
