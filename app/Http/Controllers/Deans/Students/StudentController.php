<?php

namespace App\Http\Controllers\Deans\Students;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use App\Domain\Directions\Models\Direction;
use App\Exports\ExportStudent;
use App\Jobs\ProccessUserImport;
use App\Models\Sex;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Imports\SheetNameReader;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\NBTestOnStudentModel;
use App\Models\TypeOfEducationModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Domain\Deans\Students\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use App\Domain\Deans\Students\DTO\StoreDeanStudentDTO;
use App\Domain\Deans\Students\DTO\UpdateDeanStudentDTO;
use App\Domain\Directions\Repositories\DirectionRepository;
use App\Domain\Deans\Groups\Repositories\DeanGroupRepository;
use App\Domain\Deans\Students\Actions\StoreDeanStudentAction;
use App\Domain\Deans\Students\Actions\UpdateDeanStudentAction;
use App\Models\User;
use App\Domain\Deans\Students\Requests\StoreDeanStudentRequest;
use App\Domain\Deans\Students\Requests\UpdateDeanStudentRequest;
use App\Domain\Deans\Students\Repositories\DeanStudentRepository;
use App\Domain\StudentCourses\Repositories\StudentCourseRepository;
use App\Domain\FormOfEducations\Repositories\FormOfEducationRepository;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;
use function Pest\Laravel\get;

class StudentController extends Controller
{
    /**
     * @var DeanStudentRepository
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
     * @param DeanStudentRepository $deanStudentRepository
     * @param DeanGroupRepository $deanGroupRepository
     * @param FormOfEducationRepository $formOfEducationRepository
     * @param DirectionRepository $directionRepository
     * @param StudentCourseRepository $studentCourseRepository
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
        return view('deans(dekan).students.directionFolder', [
            'students' => $this->students->getPaginate()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function separately($type_id): View|Factory|Application
    {
        if ($type_id==1) {
            $directions = Direction::query()
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',1)
                ->where('dean_id','=',45)
                ->get();
        }elseif ($type_id==2) {
            $directions = Direction::query()
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',2)
                ->where('dean_id','=',45)
                ->get();
        }elseif($type_id==3) {
            $directions = Direction::query()
                ->where('form_of_education_id','=',2)
                ->get();
        }elseif($type_id ==4){
            $directions = Direction::query()
                ->where('form_of_education_id','=',1)
                ->where('type_of_education_id','=',4)
                ->where('dean_id','=',45)
                ->get();
        }

        return view('deans(dekan).students.separatelyFolder', [
            'directions' => $directions,
            'type_id' => $type_id
        ]);
    }

    public function separatelyType($type_id): View|Factory|Application
    {
        return view('deans(dekan).students.separatelyFolder', [
            'directions' => $this->directions->getType($type_id),
            'type_id' => $type_id
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function getFormOfeducation()
    {
        return view('deans(dekan).students.formEducation', [
            'types' => $this->form_of_educations->getAll()
        ]);
    }

    /**
     * @param $direction_id
     * @return Application|Factory|View
     */
    public function getDirectionGroupSeparately($direction_id,$type): View|Factory|Application
    {
        if ($type == 1) {
            $groups = DeanGroup::query()
                ->with('get_direction_id')
                ->where('direction_id','=',$direction_id)
                ->get();
        } if ($type == 2) {
            $groups = DeanGroup::query()
                ->with('get_direction_id')
                ->where('direction_id','=',$direction_id)
                ->get();
        } if ($type == 3) {
            $groups = DeanGroup::query()
                ->with('get_direction_id')
                ->where('form_of_education_id', '=', 2)
                ->where('direction_id','=',$direction_id)
                ->get();
        }
        if($type == 4){
            $groups = DeanGroup::query()
                ->with('get_direction_id')
                ->where('direction_id','=',$direction_id)
                ->get();
        }
        return view('deans(dekan).students.separately_course', [
             'groups' => $groups,
             'type' => $type,
             'direction' => Direction::find($direction_id)
        ]);
    }

    public function get_direction_with_course($direction_id, $course,$type)
    {
        return view('deans(dekan).students.separatelyGroup', [
            'groups' => $this->students->getDirectionGroupPaginate($direction_id, $course,$type),
            'direction' => Direction::find($direction_id),
            'directions' => Direction::query()->get(),
            'course' => $course,
            'type' => $type
        ]);
    }
    // get_direction_with_course

    /**
     * @param $direction_id
     * @param $group_id
     * @return Application|Factory|View
     */
    public function getDirectionGroupStudentAll($direction_id, $group_id): View|Factory|Application
    {
        return view('deans(dekan).students.index', [
            'students' => $this->students->getDirectionGroupStudentAll($direction_id, $group_id),
            'groups' => $this->students->getGroupStudentPaginate($direction_id),
            'directions' => $this->directions->getAll(),
            'direction' => Direction::find($direction_id),
            'group' => DeanGroup::find($group_id),
        ]);
    }

    /**
     * @param $direction_id
     * @param $group_id
     * @return Application|Factory|View
     */
    public function getDirectionGroupStudentAllSeparately($direction_id, $group_id,$course,$type): View|Factory|Application
    {
        return view('deans(dekan).students.separately', [
            'students' => $this->students->getDirectionGroupStudentAll($direction_id, $group_id),
            'groups' => $this->students->getGroupStudentPaginate($direction_id),
            'directions' => $this->directions->getAll(),
            'direction' => Direction::find($direction_id),
            'groupp' => DeanGroup::find($group_id),
            'exit_student' => TransferStudentGroup::query()
                ->with(['student' => function($query){
                        $query->withTrashed()->get();
                    },
                    'transfer_group'
                ])
                ->where('exit_group_id', '=', $group_id)
                ->get(),
            'transfer_student' => TransferStudentGroup::query()
                ->with(['student' => function($query){
                    $query->withTrashed()->get();
                    },
                    'transfer_group'
                ])
                ->where('transfer_group_id', '=', $group_id)
                ->get(),
            'course' => $course,
            'type' => $type
        ]);
    }

    public function getDirectionGroupStudentAllSeparatelySort($direction_id, $group_id,$course,$type): View|Factory|Application
    {
        return view('deans(dekan).students.separatelySort', [
            'students' => $this->students->getDirectionGroupStudentAllSort($direction_id, $group_id),
            'groups' => $this->students->getGroupStudentPaginate($direction_id),
            'directions' => $this->directions->getAll(),
            'direction' => Direction::find($direction_id),
            'groupp' => DeanGroup::find($group_id),
            'exit_student' => TransferStudentGroup::query()
                ->with(['student' => function($query){
                    $query->withTrashed()->get();
                },
                    'transfer_group'
                ])
                ->where('exit_group_id', '=', $group_id)
                ->get(),
            'transfer_student' => TransferStudentGroup::query()
                ->with(['student' => function($query){
                    $query->withTrashed()->get();
                },
                    'transfer_group'
                ])
                ->where('transfer_group_id', '=', $group_id)
                ->get(),
            'course' => $course,
            'type' => $type,
        ]);
    }

    public function editStudentAll($direction_id, $group_id,$type): View|Factory|Application
    {
        return view('deans(dekan).students.editAll', [
            'students' => $this->students->getDirectionGroupStudentAll($direction_id, $group_id),
            'direction' => Direction::find($direction_id),
            'groupp' => DeanGroup::find($group_id),
            'sexes' => Sex::query()->get(),
            'type' => $type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('deans(dekan).students.create', [
            'directions' => $this->directions->getAll(),
            'languages' => $this->languages,
            'type_of_educations' => $this->type_of_educations,
            'form_of_educations' => $this->form_of_educations->getAll(),
            'student_courses' => $this->student_courses->getAll(),
            'dean_groups' => $this->groups->getAll(),
            'sexes' => Sex::query()->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDeanStudentRequest $request
     * @param StoreDeanStudentAction $action
     * @return RedirectResponse
     */
    public function store(Request $request, StoreDeanStudentAction $action): RedirectResponse
    {
        $request->validate([
            'student_id' => 'required|unique:users,student_id',
//            'hemis_id' => 'required:unique',
            'img_path' => 'mimes:jpg,png,jpeg|max:15000',
            'full_name' => 'required',
            'number_phone' => 'required',
            'language_id' => 'required',
            'type_of_education_id' => 'required',
            'form_of_education_id' => 'required',
            'direction_id' => 'required',
            'group_id' => 'required',
            'student_course_id' => 'required',
        ]);

        $user = new User();
        $user->level_id = 4;
        $user->student_id = $request->student_id;
        $user->hemis_id = $request->hemis_id;
        $user->full_name = $request->full_name;
        $user->number_phone = $request->number_phone;
        $user->language_id = $request->language_id;
        $user->type_of_education_id = $request->type_of_education_id;
        $user->form_of_education_id = $request->form_of_education_id;
        $user->student_course_id = $request->student_course_id;
        $user->direction_id = $request->direction_id;
        $user->group_id = $request->group_id;
        $user->sex_id = $request->sex_id;
        $user->excel_transfer_group = $request->excel_transfer_group;

        if ($request->hasFile('img_path')) {
            $file = $request->img_path;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . Str::random(4) . '.' . $extension;
            // File upload location
            $location = 'students/images/';
            // Upload file
            $file->move($location, $filename);
            $user->img_path = $filename;
        }
        $user->save();

        return redirect()->back()->with('success', 'Muvaffaqiyatli qo`shildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        return view('deans(dekan).students.show', [
            'student' => $this->students->getStudent($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $student
     * @return Application|Factory|View
     */
    public function edit($user): View|Factory|Application
    {

        $userw = User::where('id', '=', $user)->first();

        return view('deans(dekan).students.edit', [
            'student' => $userw,
            'directions' => $this->directions->getAll(),
            'languages' => $this->languages,
            'type_of_educations' => $this->type_of_educations,
            'form_of_educations' => $this->form_of_educations->getAll(),
            'student_courses' => $this->student_courses->getAll(),
            'dean_groups' => $this->groups->getAll(),
            'sexes' => Sex::query()->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDeanStudentRequest $request
     * @param User $student
     * @param UpdateDeanStudentAction $action
     * @return RedirectResponse
     */
    public function update(Request $request, User $student, UpdateDeanStudentAction $action): RedirectResponse
    {
        try {
            $request->merge([
                'user' => $student
            ]);
            $dto = UpdateDeanStudentDTO::fromArray($request->all());
            $action->execute($dto);
        } catch (Exception $exception) {
            return redirect()->back();
        }

        return redirect()->route('get.student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $student
     * @return RedirectResponse
     */
    public function destroy(User $student): RedirectResponse
    {
        $student->delete();
        return redirect()->back()->with('success', 'Talaba muvaffaqiyatli o`chirildi!');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function uploadStudentExcel(Request $request): RedirectResponse
    {
        $path1 = $request->file('file')->store('temp');

        $path = storage_path('app') . '/' . $path1;

        ProccessUserImport::dispatch($path);


        return redirect()->route('reports.dean');
    }

    public function getStudentID($student_id)
    {
        return response()
            ->json([
                'status' => true,
                'data' => $this->students->getStudent($student_id)
            ]);
    }

    /**
     * @param $direction_id
     * @return JsonResponse
     */
    public function getDirectionGroupId($direction_id): JsonResponse
    {
        return response()
            ->json([
                'status' => true,
                'data' => $this->students->getDirectionGroupId($direction_id)
            ]);
    }

    public function davomat_get()
    {
        $nb_list = NBTestOnStudentModel::get();
        return view('deans(dekan).davomat.index', compact('nb_list'));
    }

    /**
     * @param $direction_id
     * @param $group_id
     * @return Response
     */
    public function downloadInvoice($direction_id, $group_id)
    {
        $students = User::query()
            ->select('student_id', 'direction_id', 'group_id', 'hemis_id', 'full_name', 'type_of_education_id')
            ->where('direction_id', '=', $direction_id)
            ->where('group_id', '=', $group_id)
            ->get()
            ->sortBy('full_name');
        $direction = Direction::select('id', 'title')->find($direction_id);
        $group = DeanGroup::select('id', 'title')->find($group_id);
        $data = ['students' => $students, 'direction' => $direction, 'group' => $group];
        $pdf = Pdf::loadView('ivoices.student_table_invoice', $data);
        return $pdf->download($group->title . '.pdf');
    }

    public function downloadAllDataStudent($direction_id, $group_id)
    {
        $direction = Direction::query()->select('id','title')->where('id','=',$direction_id)->first();
        $group = DeanGroup::query()->select('id','title')->where('id','=',$group_id)->first();
        return Excel::download(new ExportStudent($direction_id,$group_id), $direction->title.' yo`nalishi '.$group->title. ' guruhi talabalari.xlsx');
    }

    public function updateAllStudent(Request $request)
    {
//        $request->validate([
//            'passport_pinfl' => 'unique:users,passport_pinfl',
//            'passport_pinfl.*' => 'unique:users,passport_pinfl',
//        ]);
        $user = $request->user_id;

        for ($i = 0; $i < count($user); $i++) {
            $student = User::find($user[$i]);
            $student->full_name = $request->full_name[$i];
            $student->passport_pinfl = $request->passport_pinfl[$i];
            $student->passport_series = $request->passport_series[$i];
            $student->number_phone = $request->number_phone[$i];
            $student->hemis_id = $request->hemis_id[$i];
            $student->student_id = $request->student_id[$i];
            $student->sex_id = !isset($request->sex_id) ? null : $request->sex_id[$i];
            $student->birthday = $request->birthday[$i];
            $student->father_fio = $request->father_fio[$i];
            $student->father_phone = $request->father_phone[$i];
            $student->mather_fio = $request->mather_fio[$i];
            $student->mather_phone = $request->mather_phone[$i];
            $student->address = $request->address[$i];
            $student->address_temporarily = $request->address_temporarily[$i];
            $student->deprived_of_parental = $request->deprived_of_parental[$i];
            $student->disabled = $request->disabled[$i];
            $student->social_security = $request->social_security[$i];
            $student->court = $request->court[$i];
            $student->workplace = $request->workplace[$i];
            if (isset($request->img_path[$i])) {
                File::delete('students/images/' . $student->img_path);
                $file = $request->img_path[$i];
                $extension = $file->getClientOriginalExtension();
                $filename = time() . Str::random(4) . '.' . $extension;
                // File upload location
                $location = 'students/images/';
                // Upload file
                $file->move($location, $filename);
                // File path
                $student->img_path = $filename;
            }
            $student->update();
        }

        return redirect()->back();
    }


//    change group direcion
    public function changeGroup(Request $request)
    {
        $group = $request->group_id;
        for ($i=0; $i<count($group); $i++)
        {
            $users[$i] = User::query()
                ->select('id','full_name','direction_id','group_id')
                ->where('direction_id','=',$request->old_direction_id)
                ->where('group_id','=',$group[$i])
                ->get();

            for ($j=0; $j<count($users[$i]); $j++)
            {
                $users[$i][$j]->update([
                    'direction_id' => $request->direction_id
                ]);
            }
        }

        return redirect()->back();
    }

    public function getTrashUser($id)
    {
        $students = User::onlyTrashed()
            ->with(['language','type_of_education','form_of_education','direction','student_course','transfer','dean_group','sex'])
            ->where('level_id','=',4)
            ->get();

        return view('deans(dekan).trashed', [
            'students' => $students
        ]);
    }

    public function studentRestore($user)
    {
        $users = User::onlyTrashed()->where('id','=',$user)->first();

        $users->restore();

        return redirect()->back();
    }
}
