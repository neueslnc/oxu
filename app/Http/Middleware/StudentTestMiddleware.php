<?php

namespace App\Http\Middleware;

use App\Models\NBTestOnStudentModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentTestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = NBTestOnStudentModel::withCount(['test_on_student_questions', 'test_on_student_questions_active'])->where('access_key', '=', $request->key)->first();

        if(($data['test_on_student_questions_count'] - $data['test_on_student_questions_active_count']) == 0 && $data['status'] != 0 ) {

            return redirect()->route('test_student');
        }

        return $next($request);
    }
}
