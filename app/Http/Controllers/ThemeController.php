<?php

namespace App\Http\Controllers;

use App\Domain\Directions\Models\Direction;
use App\Domain\Directions\Repositories\DirectionRepository;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\ThemeModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ThemeRequest;

class ThemeController extends Controller
{
    /**
     * @var DirectionRepository
     */
    public $directions;

    /**
     * @param DirectionRepository $directionRepository
     */
    public function __construct(DirectionRepository $directionRepository)
    {
        $this->directions = $directionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $count_element = 10;
        $themes = ThemeModel::query()
            ->with(['direction', 'semester'])
            ->where('teacher_id', '=', $request->user()->id)
            ->where('status', '=', 0)
            ->paginate($count_element);
        if (empty($request->input('page'))) {
            $nomer = 0;
        } else {
            $nomer = ((intval($request->input('page')) - 1) * $count_element);
        }

        return view('theme.index',
            [
                'themes' => $themes,
                'nomer' => $nomer
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        return view('theme.create',
            [
                'subjects' => $request->user()->teacher_subjects,
                'directions' => $this->directions->getAll(),
                'semesters' => Semester::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemeRequest $request)
    {
        ThemeModel::create($request->all());
        return redirect()->route('theme_subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param ThemeModel $themeModel
     * @return \Illuminate\Http\Response
     */
    public function show(ThemeModel $themeModel)
    {
        dd('0');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ThemeModel $themeModel
     * @return Application|Factory|View
     */
    public function edit($theme_subject)
    {
        $theme = ThemeModel::with(['direction'])->where('id', '=', $theme_subject)->first();

        return view('theme.edit', [
            'subjects' => Subject::all(),
            'theme' => $theme,
            'directions' => Direction::where('form_of_education_id', '=', $theme->direction->form_of_education_id)->get(),
            'semesters' => Semester::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ThemeRequest $request
     * @param ThemeModel $themeModel
     * @param $id
     * @return RedirectResponse
     */
    public function update(ThemeRequest $request, ThemeModel $themeModel, $id)
    {
        ThemeModel::where('id', '=', $id)->update([
            'theme_name' => $request['theme_name'],
            'theme_text' => $request['theme_text'],
            'subject_id' => $request['subject_id'],
            'semester_id' => $request['semester_id'],
            'direction_id' => $request['direction_id']
        ]);
        return redirect()->route('theme_subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ThemeModel $themeModel
     * @return RedirectResponse
     */
    public function destroy(ThemeModel $themeModel, $id)
    {
        // dd($id);

        ThemeModel::where('id', $id)->update([
            'status' => 1
        ]);

        return redirect()->route('theme_subject.index');
    }

    public function get_theme_subject_user(Request $request)
    {
        return response()->json([
            'objects' => $request->user()->subject_themes($request->input('subject_id'))
        ]);
    }
}
