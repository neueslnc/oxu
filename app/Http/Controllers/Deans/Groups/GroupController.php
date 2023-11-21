<?php

namespace App\Http\Controllers\Deans\Groups;

use Exception;
use App\Models\User;
use App\Models\Language;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\TypeOfEducationModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Domain\Directions\Models\Direction;
use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Contracts\Foundation\Application;
use App\Domain\Deans\Groups\DTO\StoreDeanGroupDTO;
use App\Domain\Deans\Groups\DTO\UpdateDeanGroupDTO;
use App\Domain\Deans\Groups\Actions\StoreDeanGroupAction;
use App\Domain\Deans\Groups\Actions\UpdateDeanGroupAction;
use App\Domain\Deans\Groups\Requests\StoreDeanGroupRequest;
use App\Domain\Directions\Repositories\DirectionRepository;
use App\Domain\Deans\Groups\Requests\UpdateDeanGroupRequest;
use App\Domain\Deans\Groups\Repositories\DeanGroupRepository;
use App\Domain\Deans\Students\Repositories\DeanStudentRepository;
use App\Domain\StudentCourses\Repositories\StudentCourseRepository;
use App\Domain\FormOfEducations\Repositories\FormOfEducationRepository;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * @var DeanGroupRepository
     */
    public $students;

    /**
     * @var array|Builder[]|Collection
     */
    public $directions;

    /**
     * @var Builder[]|Collection
     */
    public $languages;

    /**
     * @var DeanGroupRepository
     */
    public $groups;

    /**
     * @var Builder[]|Collection
     */
    public $type_of_educations;

    /**
     * @var Builder[]|Collection
     */
    public $form_of_educations;

    /**
     * @var Builder[]|Collection
     */
    public $student_courses;

    /**
     * @param DeanGroupRepository $deanGroupRepository
     */
    public function __construct(DeanStudentRepository $deanStudentRepository, DeanGroupRepository $deanGroupRepository, FormOfEducationRepository $formOfEducationRepository, DirectionRepository $directionRepository, StudentCourseRepository $studentCourseRepository)
    {
        $this->students = $deanStudentRepository;
        $this->directions = $directionRepository;
        $this->languages = Language::query()->get();
        $this->type_of_educations = TypeOfEducationModel::query()->get();
        $this->form_of_educations = $formOfEducationRepository;
        $this->student_courses = $studentCourseRepository;
        $this->groups = $deanGroupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('deans(dekan).groups.typeEducationFolder');
    }

    public function getDirection($type)
    {
        if ($type==1) {
//            $directions = DB::table('dean_groups')
//                ->join('directions','directions.id','=','dean_groups.direction_id')
//                ->join('form_of_education','form_of_education.id','=','dean_groups.form_of_education_id')
//                ->join('type_of_education','type_of_education.id','=','dean_groups.type_of_education_id')
//                ->join('languages','languages.id','=','dean_groups.language_id')
//                ->select('dean_groups.id','dean_groups.direction_id',
//                    'dean_groups.form_of_education_id','dean_groups.type_of_education_id','dean_groups.language_id',
//                    'directions.id','directions.title','form_of_education.id','form_of_education.title',
//                    'type_of_education.id','type_of_education.name','languages.id','languages.name','directions.code','directions.title'
//                )->where('dean_groups.form_of_education_id','=',1)
//                ->where('dean_groups.type_of_education_id','=',1)
//                ->groupBy('direction_id')
//                ->get();
            $directions = Direction::query()
                    ->where('form_of_education_id','=', 1)
                    ->where('type_of_education_id','=', 1)
                    ->where('dean_id','=', Auth::user()->id)
                    ->get();
        }if ($type==2) {
//            $directions=DB::table('dean_groups')
//                ->join('directions','directions.id','=','dean_groups.direction_id')
//                ->join('form_of_education','form_of_education.id','=','dean_groups.form_of_education_id')
//                ->join('type_of_education','type_of_education.id','=','dean_groups.type_of_education_id')
//                ->join('languages','languages.id','=','dean_groups.language_id')
//                ->select('dean_groups.id','dean_groups.direction_id',
//                    'dean_groups.form_of_education_id','dean_groups.type_of_education_id','dean_groups.language_id',
//                    'directions.id','directions.title','form_of_education.id','form_of_education.title',
//                    'type_of_education.id','type_of_education.name','languages.id','languages.name','directions.code','directions.title'
//                )->where('dean_groups.form_of_education_id','=',1)
//                ->where('dean_groups.type_of_education_id','=',2)
//                ->groupBy('direction_id')
//                ->get();
        $directions = Direction::query()
            ->where('form_of_education_id','=', 1)
            ->where('type_of_education_id','=', 2)
            ->where('dean_id','=', Auth::user()->id)
            ->get();
        }if($type==3) {
//            $directions=Direction::where('form_of_education_id','=',2)->orderBy('id','desc')
//                ->where('dean_id','=',Auth::user()->id)->get();
            $directions = Direction::query()
                ->where('form_of_education_id','=', 2)
                ->where('dean_id','=', Auth::user()->id)
                ->get();
        }if ($type == 4){
//            $directions = DB::table('dean_groups')
//                ->join('directions','directions.id','=','dean_groups.direction_id')
//                ->join('form_of_education','form_of_education.id','=','dean_groups.form_of_education_id')
//                ->join('type_of_education','type_of_education.id','=','dean_groups.type_of_education_id')
//                ->join('languages','languages.id','=','dean_groups.language_id')
//                ->select('dean_groups.id','dean_groups.direction_id',
//                    'dean_groups.form_of_education_id','dean_groups.type_of_education_id','dean_groups.language_id',
//                    'directions.id','directions.title','form_of_education.id','form_of_education.title',
//                    'type_of_education.id','type_of_education.name','languages.id','languages.name','directions.code','directions.title'
//                )->where('dean_groups.form_of_education_id','=',1)
//                ->where('dean_groups.type_of_education_id','=',4)
//                ->groupBy('direction_id')
//                ->get();
        $directions = Direction::query()
            ->where('form_of_education_id','=', 1)
            ->where('type_of_education_id','=', 4)
            ->where('dean_id','=', Auth::user()->id)
            ->get();
        }

//        $directions = Direction::query()
//            ->where('code','!=',0)
//            ->where('dean_id','=',Auth::user()->id)
//            ->get();
//        if ($type==1) {
//            $directions=Direction::where('form_of_education_id','=',1)->where('type_of_education_id','=',1)->orderBy('id','desc')
//            ->where('dean_id','=',Auth::user()->id)->paginate();
//        }elseif ($type==2) {
//            $directions=Direction::where('form_of_education_id','=',1)->where('type_of_education_id','=',2)->orderBy('id','desc')
//            ->where('dean_id','=',Auth::user()->id)->paginate();
//        }elseif($type==3) {
//            $directions=Direction::where('form_of_education_id','=',2)->orderBy('id','desc')
//            ->where('dean_id','=',Auth::user()->id)->paginate();
//        }

        return view('deans(dekan).groups.direction', [
            'directions' =>$directions,
            'type' => $type
        ]);
    }

    public function indexDirectionGroup($direction_id,$type): View|Factory|Application
    {
        return view('deans(dekan).groups.index', [
            'groups' => $this->groups->get($direction_id,$type)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('deans(dekan).groups.create', [
            'directions' => $this->directions->getAll(),
            'languages' => $this->languages,
            'type_of_educations' => $this->type_of_educations,
            'form_of_educations' => $this->form_of_educations->getAll(),
            'student_courses' => $this->student_courses->getAll(),
            'dean_groups' => $this->groups->getAll(),
            'akademik_years' => AcademicYear::where('id', '>', 30)->get(),
            // 'supervisors' => User::where('level_id', '=', 5)->get(),
            'user'=>Auth::user()->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDeanGroupRequest $request
     * @param StoreDeanGroupAction $action
     * @return RedirectResponse
     */
    public function store(StoreDeanGroupRequest $request, StoreDeanGroupAction $action): RedirectResponse
    {


        DeanGroup::create(
            [
                'title' => $request->title,
                'language_id' => $request->language_id,
                'type_of_education_id' => $request->type_of_education_id,
                'form_of_education_id' => $request->form_of_education_id,
                'direction_id' => $request->direction_id,
                'group_course_id' => $request->group_course_id,
                'group_akademik_year' => $request->group_akademik_year,
                // 'supervisor_id' => $request->supervisor,
            ]);
        // try {
        //     $dto = StoreDeanGroupDTO::fromArray($request->all());
        //     $action->execute($dto);
        // } catch (Exception $exception) {
        //     return redirect()->back();
        // }
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(DeanGroup $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DeanGroup $group
     * @return Application|Factory|View
     */
    public function edit(DeanGroup $group): View|Factory|Application
    {
        return view('deans(dekan).groups.edit', [
            'group' => $group,
            'directions' => $this->directions->getAll(),
            'languages' => $this->languages,
            'type_of_educations' => $this->type_of_educations,
            'form_of_educations' => $this->form_of_educations->getAll(),
            'student_courses' => $this->student_courses->getAll(),
            'dean_groups' => $this->groups->getAll(),
            'akademik_years' => AcademicYear::where('id', '>', 30)->get(),
            'user'=>Auth::user()->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDeanGroupRequest $request
     * @param DeanGroup $group
     * @param UpdateDeanGroupAction $action
     * @return RedirectResponse
     */
    public function update(UpdateDeanGroupRequest $request, DeanGroup $group, UpdateDeanGroupAction $action): RedirectResponse
    {
        // try {
        //     $request->merge([
        //         'group' => $group
        //     ]);
        //     $dto = UpdateDeanGroupDTO::fromArray($request->all());
        //     $action->execute($dto);
        // } catch (Exception $exception) {
        //     return redirect()->back();
        // }
        DeanGroup::where('id', '=', $group->id)->update([
            'title' => $request->title,
            'language_id' => $request->language_id,
            'type_of_education_id' => $request->type_of_education_id,
            'form_of_education_id' => $request->form_of_education_id,
            'direction_id' => $request->direction_id,
            'group_course_id' => $request->group_course_id,
            'group_akademik_year' => $request->group_akademik_year,
        ]);

        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeanGroup $group
     * @return RedirectResponse
     */
    public function destroy(DeanGroup $group): RedirectResponse
    {
        $group->delete();

        return redirect()->back()->with('success','Guruh muvaffaqiyali o`chirildi.');
    }

    function states(Request $request)
    {
        $dean_groups = DeanGroup::where('id', '=', $request->input('group_id'))
            // $dean_groups = DeanGroup::where('id', '=', 1)

            // ->where('type_of_education_id', '=', $request->input('type_of_education_id'))
            // ->where('form_of_education_id', '=', $request->input('form_of_education_id'))
            // ->where('direction_id', '=', $request->input('direction_id'))
            // ->where('group_course_id', '=', $request->input('group_course_id'))
            // ->where('group_akademik_year', '=', $request->input('group_akademik_year'))
            ->first();

        $languages = $dean_groups->get_language;
        $type = $dean_groups->get_type_of_education_id;
        $form = $dean_groups->get_form_of_education_id;
        $direction = $dean_groups->get_direction_id;
        $course = $dean_groups->get_group_course_id;
        return response()->json([
            'group_inf' => $dean_groups,
            'language' => $languages,
            'type' => $type,
            'form' => $form,
            'direction' => $direction,
            'course' => $course,
        ]);
    }
    function types(Request $request)
    {
        // if ($request->input('type_of_education_id')==1) {
        //     $form_of_education_id=1;
        //     $language_id=1;
        // }
        // elseif ($request->input('type_of_education_id')==2) {
        //     $form_of_education_id=1;
        //     $language_id=1;
        // }
        // elseif ($request->input('type_of_education_id')==3) {

        // }
        $dean_groups = Direction::where('form_of_education_id', '=', $request->input('form_of_education_id'))->where('dean_id','=',6)
                    ->where('language_id','=',$request->input('language_id'))
            // $dean_groups = DeanGroup::where('id', '=', 1)

            // ->where('type_of_education_id', '=', $request->input('type_of_education_id'))
            // ->where('form_of_education_id', '=', $request->input('form_of_education_id'))
            // ->where('direction_id', '=', $request->input('direction_id'))
            // ->where('group_course_id', '=', $request->input('group_course_id'))
            // ->where('group_akademik_year', '=', $request->input('group_akademik_year'))
            ->get();

        // $languages = $dean_groups->get_language;
        // $type = $dean_groups->get_type_of_education_id;
        // $form = $dean_groups->get_form_of_education_id;
        // $direction = $dean_groups->get_direction_id;
        // $course = $dean_groups->get_group_course_id;
        return response()->json([
           'direction'=>$dean_groups ,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function year()
    {
        return view('deans(dekan).groups.year', [
            'years' => AcademicYear::query()
                ->orderBy('id','desc')
                ->get(),
            'groups' => $this->groups->getAll()
        ]);
    }

    /**
     * @param $academic_year_id
     * @return Application|Factory|View
     */
    public function yearGroupAll($academic_year_id)
    {
        return view('deans(dekan).groups.yearGroup', [
            'groups' => DeanGroup::query()
                ->where('group_akademik_year', '=', $academic_year_id)
                ->get()
        ]);
    }

    public function getGroupWithDirection(Request $request)
    {
        $groups = DeanGroup::query()
            ->where('direction_id','=',$request->direction_id)
            ->get();

        return response()
            ->json([
                'status' => true,
                'groups' => $groups
            ]);
    }
}
