<?php

namespace App\Http\Controllers;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Directions\Models\Direction;
use App\Models\ExamTestOnStudentAnswerModel;
use App\Models\ExamTestOnStudentModel;
use App\Models\ExamTestOnStudentQuestionModel;
use App\Models\ExamTestQuestionModel;
use App\Models\ExamTestThemeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Exam\CreateRequest;
use App\Models\Exam;
use Illuminate\Support\Facades\App;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Jobs\ProcessPodcast;
use App\Models\Sciences;
use App\Models\Semester;
use App\Models\StudentGroup;
use App\Models\Subject;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ExamController extends Controller
{
    public function index() : View
    {

        return view('exam.index', ['all' => Exam::with('semester', 'academic_year', 'direction', 'subject', 'control_type')->get()]);
    }

    public function create() : View
    {


        return view('exam.create', [
            'syllabus' => \App\Models\Syllabus::all(),
            'academic_years' => \App\Models\AcademicYear::all(),
            'semesters' => \App\Models\Semester::all(),
            'semestrs' => Semester::all(),
            'directions' => Direction::all(),
            'subjects' => Subject::all()
        ]);
    }

    public function store(CreateRequest $request) : RedirectResponse
    {
        Exam::create($request->all());

        return redirect()->route('supervisor_exams.exam.index');
    }

    public function show($id)
    {
        // dd(User::first()->status_student_exam_accept);

        return view('exam.edit', [
            'item' => Exam::where('id', '=', $id)->first(),
            'exam_questions' => Exam::where('id', '=', $id)->first()->exam_questions,
            'syllabus' => \App\Models\Syllabus::all(),
            'academic_years' => \App\Models\AcademicYear::all(),
            'semesters' => \App\Models\Semester::all(),
            'semestrs' => Semester::all(),
            'student_groups' => DeanGroup::all(),
            'sciens' => Sciences::all(),
            'id' => $id,
            'directions' => Direction::all(),
            'subjects' => Subject::all(),
            'exam_test_themes' => ExamTestThemeModel::all()
        ]);
    }

    public function generate_test(Request $request){

        $exam_test_themes = ExamTestThemeModel::where('id', '=', $request->input('theme_name'))->first();

        $exam = Exam::where('id', '=', $request->input('exam_id'))->first();

        $exam_test_questions = ExamTestQuestionModel::with('variants')->where('exam_id', '=', $exam_test_themes['id'])->get()->shuffle()->take($exam['number_questions']);

        $ball = $exam['maximum_score'] / count($exam_test_questions);

        try {

            DB::transaction(function () use ($request, $exam_test_questions, $ball) {

                foreach ($request->input('select_students') as $student){

                    $exam_test_on_student = ExamTestOnStudentModel::create([
                        'student_id' => intval($student['id']),
                        'exam_id' => intval($request->input('exam_id')),
                    ]);

                    foreach ($exam_test_questions as $exam_test_question){

                        $exam_test_question_student = ExamTestOnStudentQuestionModel::create([
                            'exam_test_on_student_id' => intval($exam_test_on_student['id']),
                            'exam_test_question_id' => intval($exam_test_question['id']),
                            'ball' => $ball,
                            'question' => $exam_test_question['question'],
                            'type' => 'variant',
                        ]);

                        foreach ($exam_test_question['variants']->shuffle() as $variant){

                            ExamTestOnStudentAnswerModel::create([
                                'variant' => $variant['variant'],
                                'correct' => $variant['correct'],
                                'exam_test_on_stu_ques_id' => $exam_test_question_student['id']
                            ]);
                        }
                    }
                }
            });

        } catch (\Exception $e){

            throw new \Exception($e->getMessage());
        }
    }
}
