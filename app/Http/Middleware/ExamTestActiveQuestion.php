<?php

namespace App\Http\Middleware;

use App\Models\ExamsContorlPC;
use App\Models\ExamTestOnStudentModel;
use Closure;
use Illuminate\Http\Request;

class ExamTestActiveQuestion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $pc = ExamsContorlPC::where('nomer', '=', $request->input('nomer') )->first();

        $exam_test_student = ExamTestOnStudentModel::withCount('question_exam_active', 'question_exam_disabled')->where('student_id', '=', $pc->user_id)->where('status', '=', 0)->first();

        if ($exam_test_student['question_exam_active_count'] == 0){
            return abort(500);
        }
        return $next($request);
    }
}
