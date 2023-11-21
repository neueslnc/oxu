<?php

namespace App\Http\Controllers\StudentCourses;

use App\Domain\StudentCourses\Actions\StoreStudentCourseAction;
use App\Domain\StudentCourses\Actions\UpdateStudentCourseAction;
use App\Domain\StudentCourses\DTO\StoreStudentCourseDTO;
use App\Domain\StudentCourses\DTO\UpdateStudentCourseDTO;
use App\Domain\StudentCourses\Models\StudentCourse;
use App\Domain\StudentCourses\Repositories\StudentCourseRepository;
use App\Domain\StudentCourses\Requests\StoreStudentCourseRequest;
use App\Domain\StudentCourses\Requests\UpdateStudentCourseRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    /**
     * @var StudentCourseRepository
     */
    public $courses;

    /**
     * @param StudentCourseRepository $studentCourseRepository
     */
    public function __construct(StudentCourseRepository $studentCourseRepository)
    {
        $this->courses = $studentCourseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('student_courses.index', [
            'courses' => $this->courses->getPaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('student_courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudentCourseRequest $request
     * @param StoreStudentCourseAction $action
     * @return RedirectResponse
     */
    public function store(StoreStudentCourseRequest $request, StoreStudentCourseAction $action): RedirectResponse
    {
        try {
            $dto = StoreStudentCourseDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->route('student_courses.index');
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
     * @param StudentCourse $student_course
     * @return Application|Factory|View
     */
    public function edit(StudentCourse $student_course): View|Factory|Application
    {
        return view('student_courses.edit', [
            'course' => $student_course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentCourseRequest $request
     * @param StudentCourse $student_course
     * @param UpdateStudentCourseAction $action
     * @return RedirectResponse
     */
    public function update(UpdateStudentCourseRequest $request, StudentCourse $student_course, UpdateStudentCourseAction $action): RedirectResponse
    {
        try {
            $request->merge([
                'student_course' => $student_course
            ]);
            $dto = UpdateStudentCourseDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->route('student_courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StudentCourse $student_course
     * @return RedirectResponse
     */
    public function destroy(StudentCourse $student_course): RedirectResponse
    {
        $student_course->delete();

        return redirect()->back();
    }
}
