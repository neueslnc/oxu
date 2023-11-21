<?php

use App\Domain\Directions\Models\Direction;
use App\Models\Sex;
use App\Models\User;
use App\Models\ThemeModel;
use Illuminate\Http\Request;
use App\Models\NotificationModel;
use App\Report\Rektor\NBController;
use App\Models\NBTestOnStudentModel;
use App\Http\Controllers\TestStudent;
use App\Report\Rektor\TestController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Helper\RedirectUserAuthHelper;
use App\Http\Controllers\StudentGroup;
use App\Models\ExamTestOnStudentModel;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ThemeController;
use App\Models\HistoryExamPCStudentModel;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Http\Controllers\TestThemeController;
use App\Http\Controllers\Deans\DeanController;
use App\Http\Controllers\Super\UserController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\StudentExamController;
use App\Http\Controllers\NBTestStudentController;
use App\Http\Controllers\Rectors\RectorController;
use App\Http\Controllers\TestOnStudentContoroller;
use App\Http\Controllers\Super\PlayMobileController;
use App\Http\Controllers\Super\ExamStudentController;
use App\Http\Controllers\Deans\Groups\GroupController;
use App\Http\Controllers\Student_NB\ExerciseController;
use App\Http\Controllers\Directions\DirectionController;
use App\Http\Controllers\Student_NB\StudentNbController;
use App\Http\Controllers\Supervisors\SupervisorController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Deans\Specialty\SpecialtyController;
use App\Report\Rektor\DeanController as ReportDeanController;
use App\Http\Controllers\SuperVisirosExam\ControlPCController;
use App\Http\Controllers\StudentCourses\StudentCourseController;
use App\Http\Controllers\Deans\Supervisor\DeanSuppervisorController;
use App\Http\Controllers\FormOfEducations\FormOfEducationController;
use App\Http\Controllers\Deans\Connect_groups\ConnectGroupController;
use App\Report\SuperVisors\TestController as SuperVisorsTestController;
use App\Http\Controllers\Deans\Transfers\TransferStudentGroupController;
use App\Http\Controllers\Nb\Student\TestController as StudentTestController;
use App\Http\Controllers\Deans\Students\StudentController as TalabaController;
use App\Http\Controllers\Supervisors\DeanController as SupervisorsDeanController;
use App\Http\Controllers\Supervisors\SupervisorNB;
use App\Report\Dean\StudentController as DeanStudentController;
use App\Report\Rektor\GroupController as RektorGroupController;
use App\Report\Rektor\GroupTransferController;
use App\Report\Rektor\YearController;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth', 'check_nb'])->group(function () {
//     Route::get('/check_nb', [NBController::class, 'check'])->name('nb.check');
// });


Route::middleware(['auth'])->group(function () {
    Route::get('/', function (Request $request) {
        if (RedirectUserAuthHelper::hasDefaultRouteRole($request)) {
            return RedirectUserAuthHelper::redirectDefaultRole($request);
        }
    });

    Route::any('/destroy', [AuthenticatedSessionController::class, 'destroy'])->name('destroy');

    Route::group(['middleware' => 'role:super_admin'], function () {

    });

    Route::prefix('superadmin')->group(function () {
        Route::name('superadmin.')->group(function () {

            Route::resource('/user', UserController::class);

            Route::resource('/form_of_educations', FormOfEducationController::class);

            Route::resource('/student_courses', StudentCourseController::class);

            Route::resource('/departament', DepartamentController::class);

            Route::resource('{admin_id}/sms_message', PlayMobileController::class);

            Route::resource('/exam_student', ExamStudentController::class);

            Route::post('get_update_objects', [ExamStudentController::class, 'get_update_objects'])->name('get_update_objects');

            Route::post('/get/user/phone_number', [PlayMobileController::class, 'get_phone'])->name('get_phone');

        });
    });

    Route::group(['middleware' => 'role:admin'], function () {

        Route::resource('/teacher', TeacherController::class);

        Route::resource('/subject', SubjectController::class);
    });

    Route::group(['middleware' => 'role:teacher'], function () {

        Route::resource('/test_theme', TestThemeController::class);
        Route::resource('/directions', DirectionController::class);

        Route::resource('/test_on_student', TestOnStudentContoroller::class);

        Route::post('/get_test_theme', [TestThemeController::class, 'get_test_theme'])->name('get_test_theme');

        Route::post('/get_test_direction', [TestThemeController::class, 'get_test_direction'])->name('get_test_direction');

        Route::resource('/theme_subject', ThemeController::class);

        Route::post('/get_theme_subject_user', [ThemeController::class, 'get_theme_subject_user'])->name('get_theme_subject_user');
    });

    Route::group(['middleware' => 'role:student'], function () {
        Route::get('student/logic', [StudentController::class, 'students'])->name('students.logic');
        Route::get('student/example', [StudentController::class, 'example'])->name('students.example');
        Route::get('student/exams', [StudentController::class, 'exams'])->name('students.exams');

        Route::resource('/student_nb', StudentNbController::class);
    });

    Route::resource('student_group', StudentGroup::class);

    Route::get('admin/main', [StudentGroup::class, 'index_admin'])->name('admin.main.index');

    Route::resource('/student', StudentController::class);

    Route::resource('student_test', TestStudent::class);

    Route::post('student_test_import', [TestStudent::class, 'import_xlsx'])->name('student_test_import');

    Route::post('student_groupt_import', [StudentGroup::class, 'import_xlsx'])->name('student_groupt_import');

    Route::group(['prefix' => 'supervisors', 'middleware' => 'role:supervisor'], function () {
        Route::get('homepage', [SupervisorController::class, 'homepage'])->name('supervisors.homepage');
        Route::post('add_data', [SupervisorController::class, 'data'])->name('supervisors.data');


        Route::name('supervisors.')->group(function () {
            Route::resource('dean_group', SupervisorsDeanController::class);

            Route::get('/student/edit/direction/{direction_id}/group/{group_id}', function ($direction_id, $group_id){

                $student = new \App\Domain\Deans\Students\Repositories\DeanStudentRepository;

                return view('supervisors.editAll', [
                    'students' => $student->getDirectionGroupStudentAll($direction_id, $group_id),
                    'direction' => Direction::find($direction_id),
                    'groupp' => DeanGroup::find($group_id),
                    'sexes' => Sex::query()->get()
                ]);
            })->name('edit.allStudent');

            Route::post('/update/all_tudent', function (Request $request){

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

                return redirect()->route('supervisors.dean_group.show', ['dean_group' => $request->group_id]);
            })->name('update.allStudent');

//            Route::resource('/students', TalabaController::class);
//
            Route::post('get_students', function (Request $request) {
                return response()->json([
                    'status' => '1',
                    'items' => User::with('group')->where('level_id', '=', 4)->where('group_id', '=', $request->input('group_id'))->orderBy('full_name')->get()
                ]);
            })->name('get_students');

            Route::post('get_teacher', function (Request $request) {
                return response()->json([
                    'status' => '1',
                    'items' => \App\Models\TeacherOnSubject::with('user')->where('subject_id', '=', $request->input('subject_id'))->get()
                ]);
            })->name('get_teacher');

            Route::post('get_themes', function (Request $request) {
                // $g_id=$request->input('group_id');
                // $d_id=DeanGroup::where('id','=',$g_id)->first()->direction_id;
                return response()->json([
                    'status' => '1',
                    'items' => ThemeModel::with(['theme_mb', 'teacher'])
                        ->where('subject_id', '=', $request->input('subject_id'))
                        ->where('semester_id', '=', $request->input('semester_id'))
//                       ->where('direction_id', '=', $request->input('direction_id'))
                        ->where('status', '=', 0)
                        ->get()
                ]);
            })->name('get_themes');

            Route::post('add_mb_on_student', [SupervisorNB::class, 'add_mb_on_student'])->name('add_mb_on_student');

            Route::post('get_theme', function (Request $request) {
                return response()->json([
                    'status' => '1',
                    'items' => ThemeModel::where('subject_id', '=', $request->input('subject_id'))->get()
                ]);
            })->name('get_theme');
        });

        Route::resource('supervisors', SupervisorController::class);

        Route::post('set_metrick_student_data', [SupervisorController::class, 'set_metrick_student_data'])->name('set_metrick_student_data');
    });

    Route::prefix('supervisor_exams')->group(function () {
        Route::name('supervisor_exams.')->group(function () {
            Route::resource('exam', ExamController::class);
            Route::post('generate_test', [ExamController::class, 'generate_test'])->name('generate_test');
            Route::resource('control_pc', ControlPCController::class);

            Route::group(['prefix' => 'report'], function () {
                Route::name('report.')->group(function () {
                    Route::get('index', [SuperVisorsTestController::class, 'index'])->name('index');
                    Route::post('get_student', [SuperVisorsTestController::class, 'get_student'])->name('get_student');
                    Route::post('filter_test', [SuperVisorsTestController::class, 'filter_test'])->name('filter_test');
                });
            });

            Route::post('get_student', function (Request $request) {

                $user = User::withCount(['get_nb'])->where('hemis_id', '=', $request->input('id'))->first();

                return response()->json([
                    'status' => 200,
                    'data' => [
                        'id' => $user->id,
                        'fio' => $user->full_name,
                        'mb_status' => $user->get_nb_count == 0 ? 0 : 1 ,
                        'group' => $user->group->name,
                        'debit_contract' => $user->debit_contrakt,
                        'mb_status' => $user->mb_status
                    ],
                    'img_path' => asset('students/images/'.$user->img_path)
                ]);
            })->name('get_student');

            Route::get('face_id_login_group', function (){ return view('face_id.nb.login_group', ['groups' => DeanGroup::all()]); })->name('face_id_login_group');

            Route::post('get_students_face_id', function (Request $request) {

                $users = User::withCount(['get_nb'])->with('activePc')->where('group_id', '=', $request->input('group_id'))->get();

                $datas = [];

                foreach ($users as $user){

                    if (!$user->activePc){
                        array_push($datas, [
                            'id' => $user->id,
                            'fio' => $user->full_name,
                            'mb_status' => $user->get_nb_count == 0 ? 0 : 1 ,
                            'group' => $user->group->name,
                            'debit_contract' => $user->debit_contrakt,
                            'mb_status' => $user->mb_status,
                            'img_path' => asset('students/images/'.$user->img_path)
                        ]);
                    }
                }

                return response()->json([
                    'status' => 200,
                    'data' => $datas
                ]);
            })->name('get_students_face_id');

            Route::post('set_pc_active', function (Request $request) {

                $pc = \App\Models\ExamsContorlPC::where('status', '=', 0)->first();

                if ($pc) {

                    $user_pc = \App\Models\ExamsContorlPC::where('user_id', '=', $request->input('student_id'))->first();

                    if ($user_pc) {

                        return response()->json([
                            'status' => 201,
                            'data' => [
                                'message' => "У студента есть компьютер- " . $user_pc->nomer . " ."
                            ]
                        ]);
                    }

                    $pc->status = 1;

                    $pc->user_id = $request->input('student_id');

                    $pc->save();

                    HistoryExamPCStudentModel::create([
                        'exam_pc_id' => $pc->id,
                        'student_id' => $pc->user_id
                    ]);

                    return response()->json([
                        'status' => 200,
                        'data' => [
                            'message' => "ПК номер -" . $pc->nomer . ", IP =" . $pc->local_ip,
                            'user_id' => $pc->user_id,
                            'pc_nomer' => $pc->nomer,
                            'pc_name' => $pc->name,
                            'pc_local_ip' => $pc->local_ip
                        ]
                    ]);

                } else {
                    return response()->json([
                        'status' => 201,
                        'data' => [
                            'message' => "Свободныз ПК нет."
                        ]
                    ]);
                }

            })->name('set_pc_active');

            Route::post('get_students', function (Request $request) {
                return response()->json([
                    'status' => '1',
                    'items' => User::with('group')->select('id', 'full_name', 'debit_contrakt', 'mb_status', 'group_id')->where('level_id', '=', 4)->where('group_id', '=', $request->input('group_id'))->get()
                ]);
            })->name('get_students');
        });
    });

    Route::group(['prefix' => 'deans', 'middleware' => 'role:dean'], function () {
        Route::resource('groups', GroupController::class);
        Route::get('group/direction/{type}', [GroupController::class,'getDirection'])->name('getDirection');
        Route::get('groupDirection/{direction_id}/{type}', [GroupController::class,'indexDirectionGroup'])->name('indexDirectionGroup');
        Route::resource('deans_supervisor', DeanSuppervisorController::class);

        Route::resource('specialty', SpecialtyController::class);
        Route::get('specialty/type/{type}', [SpecialtyController::class,'yonalishlar'])->name('yonalishlar');
        Route::get('specialty/type/{typem}', [SpecialtyController::class,'yonalishlarMagistr'])->name('yonalishlarM');

        Route::resource('deans_connect_group', ConnectGroupController::class);

        Route::resource('specialty', SpecialtyController::class);

        Route::get('/get/states', [GroupController::class, 'states'])->name('get_states');
        Route::get('/get/type', [GroupController::class, 'types'])->name('get_type');

        Route::get('/get/connect/directions', [ConnectGroupController::class, 'connect_direction'])->name('get_connect_direction');
        Route::get('/get/direction/supervisor', [ConnectGroupController::class, 'getDirectionSupervisor'])->name('get.directionSupervisor');
        Route::get('/get/check/group/filter', [ConnectGroupController::class, 'checkGroupFilter'])->name('check.groupFilter');

        Route::get('/get/connect/groups', [ConnectGroupController::class, 'connect_groups'])->name('get_connect_groups');
        Route::get('/get/group/direction', [GroupController::class, 'getGroupWithDirection'])->name('get.groupWithDirection');

        Route::get('/get/statistik', [ConnectGroupController::class, 'get_statistika'])->name('get_statistik_groups');

        Route::resource('/transfers', TransferStudentGroupController::class);
        Route::resource('/students', TalabaController::class);
        Route::get('/page', [DeanController::class, 'index'])->name('dean.homepage');
        Route::get('/direction/type', [DirectionController::class, 'getDirectionType'])->name('get.direction');
        Route::get('/get/states', [GroupController::class, 'states'])->name('get_states');
        Route::get('/students/davomat/sidebar', [TalabaController::class, 'davomat_get'])->name('get.davomat');
        Route::get('/student/status/{type_id}', [TalabaController::class, 'separately'])->name('get.student');
        Route::get('/student/status/type/{type_id}', [TalabaController::class, 'separately'])->name('get.student.type');
        Route::get('/typeeducation', [TalabaController::class, 'getFormOfeducation'])->name('get.formOfEducation');
        Route::get('/student/direction/{direction_id}/{type}/group/separately', [TalabaController::class, 'getDirectionGroupSeparately'])->name('get.directionGroupSeparately');
        Route::get('/student/{direction_id}/{course}/{type}/separately', [TalabaController::class, 'get_direction_with_course'])->name('get.get_direction_with_course');
        Route::get('/student/direction/{direction_id}/group', [TalabaController::class, 'getDirectionGroup'])->name('get.directionGroup');
        Route::post('/student/direction/{direction_id}/group/all', [TalabaController::class, 'getDirectionGroupId'])->name('get.directionGroupId');
        Route::get('/student/direction/{direction_id}/group/{group_id}/{course}/{type}/all/separately', [TalabaController::class, 'getDirectionGroupStudentAllSeparately'])->name('get.directionGroupStudentSeparately');
        Route::get('/student/direction/{direction_id}/group/{group_id}/{course}/{type}/all/separately/sort', [TalabaController::class, 'getDirectionGroupStudentAllSeparatelySort'])->name('get.directionGroupStudentSeparatelySort');
        Route::get('/student/edit/direction/{direction_id}/group/{group_id}/{type}', [TalabaController::class, 'editStudentAll'])->name('edit.allStudent');
        Route::post('/update/all_tudent', [TalabaController::class, 'updateAllStudent'])->name('update.allStudent');
        Route::post('/update/supervisorGroup', [DeanSuppervisorController::class, 'updateSupervisorGroup'])->name('update.supervisorGroup');
        Route::post('/update/supervisorDirection', [DeanSuppervisorController::class, 'updateSupervisorDirection'])->name('update.supervisorDirection');
        Route::post('/transfer/change/expulsion', [TransferStudentGroupController::class, 'storeExpulsionStudent'])->name('transfer.storeExpulsionStudent');
        Route::post('/transfer/academic/leave', [TransferStudentGroupController::class, 'storeAcademicLeaveStudent'])->name('transfer.storeAcademicLeaveStudent');
        Route::post('/transfer/give', [TransferStudentGroupController::class, 'storeGiveStudent'])->name('transfer.storeGiveStudent');
        Route::post('/transfer/otm', [TransferStudentGroupController::class, 'storeOTMStudent'])->name('transfer.storeOTMStudent');
        Route::post('/student/recovery/{transfer_id}', [TransferStudentGroupController::class, 'studentRecovery'])->name('student.recovery');
        Route::get('/transfer/give/all', [TransferStudentGroupController::class, 'getPaginateGiveStudent'])->name('transfer.give');
        Route::post('/update/transfer/student/file/{transfer}', [TransferStudentGroupController::class, 'updateTransferUploadFile'])->name('update.transferUploadFile');
        Route::get('/transfer/recovery/all', [TransferStudentGroupController::class, 'getPaginateRecoveryStudent'])->name('transfer.recovery');
        Route::get('/transfer/otm/all', [TransferStudentGroupController::class, 'getPaginateOTMStudent'])->name('transfer.otm');
        Route::get('/transfer/report/all', [TransferStudentGroupController::class, 'reportData'])->name('reports');
        Route::get('/transfer/report/month', [TransferStudentGroupController::class, 'monthlyReportView'])->name('reports.month');
        Route::get('/transfer/report/month/{date}', [TransferStudentGroupController::class, 'monthlyReportViewData'])->name('reports.monthData');
        Route::get('/transfer/academic/leave/all', [TransferStudentGroupController::class, 'getPaginateAcademicLeave'])->name('transfer.academicLeave');
        Route::get('/academic/year', [GroupController::class, 'year'])->name('years');
        Route::get('/academic/year/{academic_year_id}/groups', [GroupController::class, 'yearGroupAll'])->name('years.group');
        Route::get('/transfer/group/all', [TransferStudentGroupController::class, 'getPaginateTransferGroup'])->name('transfer.groupAll');
        Route::get('/sex/all', [StudentController::class, 'getSexCount'])->name('sex.all');
        Route::get('/transfer/expulsion/all', [TransferStudentGroupController::class, 'getPaginateTransferExpulsion'])->name('transfer.expulsionAll');
        Route::post('/upload/file/excel', [TalabaController::class, 'uploadStudentExcel'])->name('upload.fileExcel');
        Route::post('/student/getId/{student_id}', [TalabaController::class, 'getStudentID'])->name('student.getId');
        Route::get('/student/download/file/{fileName}', [TransferStudentGroupController::class, 'downloadFile'])->name('student.downloadFile');
        Route::get('/{direction_id}/{group_id}', [TalabaController::class, 'downloadInvoice'])->name('student.invoice');
        Route::post('/change/group', [TalabaController::class, 'changeGroup'])->name('change.group');
        Route::get('/export/student/data/{direction_id}/{group_id}', [TalabaController::class, 'downloadAllDataStudent'])->name('student.exportData');
        Route::get('/trash/user/{id}', [TalabaController::class, 'getTrashUser'])->name('getTrashUserr');
        Route::post('/restore/user/{user}', [TalabaController::class, 'studentRestore'])->name('studentRestore');
    });


    //REPORT RECTOR SECTION START
    Route::group(['prefix' => 'reports', 'middleware' => 'role:rektor' ], function () {
        Route::name('reports.')->group(function () {

            Route::get('/dean_s_r', [ReportDeanController::class, 'index'])->name('dean_s_r');
            Route::get('/deab_st_r', [RektorGroupController::class, 'index'])->name('deab_st_r');
            Route::get('/dean_sf_r', [GroupTransferController::class, 'index'])->name('dean_sf_r');
            Route::get('/dean_sy_r', [YearController::class, 'index'])->name('dean_sy_r');
            Route::get('/test', [TestController::class, 'index'])->name('test');
            Route::get('/nb', [NBController::class, 'index'])->name('nb');

            Route::get('/', [RectorController::class, 'index'])->name('rectors.index');

            Route::get('/reports', [RectorController::class, 'report'])->name('rektors.report');

            Route::group(['prefix' => 'test'], function () {
                Route::name('test.')->group(function () {
                    Route::post('get_student', [TestController::class, 'get_student'])->name('get_student');
                    Route::post('filter_test', [TestController::class, 'filter_test'])->name('filter_test');

                });
            });

            Route::group(['prefix' => 'exam_student'], function () {
                Route::name('exam_student.')->group(function () {
                    Route::get('finishing_exam_student', [TestController::class, 'finishing_exam_student'])->name('finishing_exam_student');
                    Route::post('save_exam_result_supervisor', [TestController::class, 'save_exam_result_supervisor'])->name('save_exam_result_supervisor');
                    Route::post('set_supervisor_view', [TestController::class, 'set_supervisor_view'])->name('set_supervisor_view');
                });
            });

            Route::group(['prefix' => 'nb'], function () {
                Route::name('nb.')->group(function () {
                    Route::post('get_student', [NBController::class, 'get_student'])->name('get_student');
                    Route::post('filter_nb', [NBController::class, 'filter_nb'])->name('filter_nb');
                });
            });

            Route::group(['prefix' => 'dean'], function () {
                Route::name('dean.')->group(function () {
                    Route::post('filter_student_r', [ReportDeanController::class, 'filterStudent'])->name('filter_student_r');
                    Route::post('filter_group_r', [RektorGroupController::class, 'filter_group'])->name('filter_group_r');
                    Route::post('filter_transfer_r', [GroupTransferController::class, 'filter_transfer_group'])->name('filter_transfer_r');
                    Route::post('filter_transfer_year_r', [YearController::class, 'filter_transfer_year'])->name('filter_transfer_year_r');
                });
            });
        });

        Route::get('/exam_student', function ()
        {
            return view('rectors.exam_student.index', [
                'groups' => DeanGroup::all(),
                'all' => ExamTestOnStudentModel::with('student.dean_group')->get()
            ]);
        });

    });
    //REPORT RECTOR SECTION END

    Route::group(['prefix' => 'reports', 'middleware' => 'role:dean' ], function () {
        Route::name('reports.')->group(function () {

            Route::get('/dean', [DeanStudentController::class, 'index'])->name('dean');

            Route::group(['prefix' => 'dean'], function () {
                Route::name('dean.')->group(function () {
                    Route::post('filter_student', [DeanStudentController::class, 'filterStudent'])->name('filter_student');
                });
            });
        });

        Route::get('/exam_student', function ()
        {
            return view('rectors.exam_student.index', [
                'groups' => DeanGroup::all(),
                'all' => ExamTestOnStudentModel::with('student.dean_group')->get()
            ]);
        });

    });

    Route::get('/clear_cache', function () {

        Artisan::call('config:clear');

        Artisan::call('config:cache');

        Artisan::call('view:clear');

        Artisan::call('view:cache');

        Artisan::call('route:clear');

        Artisan::call('route:cache');

        return redirect()->route('login');
    });

    Route::get('get_notification', function (Request $request)
    {

        try {

            $notification = NotificationModel::where('taker_id', '=', $request->user()->id)->where('status', '=', 0)->first();

            $notification->status = 1;

            $notification->save();

            return response()->json([
                'objects' => [
                    'message' => $notification
                ],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'objects' => [
                ]
            ], 404);
        }
    })->name('get_notification');

    Route::group(['prefix' => 'booker', 'middleware' => 'role:booker' ], function () {
        Route::name('booker.')->group(function () {
            Route::resource('students', \App\Http\Controllers\Booker\StudentController::class);

            Route::post('filterStudent', [\App\Http\Controllers\Booker\StudentController::class, 'filterStudent'])->name('filterStudent');
            Route::post('updateDebitContraktStudent', [\App\Http\Controllers\Booker\StudentController::class, 'updateDebitContraktStudent'])->name('updateDebitContraktStudent');
        });
    });

    Route::resource('test_nb', \App\Http\Controllers\Supervisors\NBController::class);

});

Route::get('/exercise', [ExerciseController::class, 'loginStudentId'])->name('exercise.login-student-id');
Route::post('/exercise', [ExerciseController::class, 'login'])->name('exercise.login');
Route::get('/exercise/index', [ExerciseController::class, 'index'])->name('exercise.index');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login_post');
});

// Route::get("/load_script", function () {

//     if (env('APP_DEBUG')) {

//         Artisan::call('migrate:fresh');

//         Artisan::call('db:seed');

//         return view("reload_script");
//     }
// })->name("load_script");

Route::get('test_t/{key}', function (Request $request, $key) {

    return NBTestOnStudentModel::with(['test_on_student_questions' => function ($query) {
        $query->get([
            'mb_test_on_student_id',
            'mb_test_question_id',
            'question',
            'type',
            'waiting_seconds'
        ]);
        $query->with(['test_on_student_answers' => function ($query) {
            $query->select([
                'variant',
                'mb_test_on_student_question_id'
            ]);
        }]);
    }])->get();
});

Route::get('mb_student_test', function (Request $request) {
    return view('test_student.index');
});

// Route::middleware(['student_test'])->group(function () {

//     Route::get('passing_test/{key}', [PassingTest::class, 'index'])->name('passing_test');

//     Route::post('passing_test/{key}', [PassingTest::class, 'store'])->name('passing_test_store');

// });

Route::group(['prefix' => 'students'], function () {
    Route::name('students.')->group(function () {

        Route::get('login', function (Request $request) {
            return view('face_id.nb.login');
        })->name('login');

        Route::post('set_pc_active', function (Request $request) {

            $pc = \App\Models\ExamsContorlPC::where('status', '=', 0)->first();

            if ($pc) {
                $pc::where('status', '=', 0)->update([
                    'status' => 1,
                    'user_id ' => $request->input('student_id')
                ]);

                return response()->json([
                    'status' => 200,
                    'data' => [
                        'message' => "ПК номер -" . $pc->nomer . ", IP =" . $pc->local_ip
                    ]
                ]);
            } else {
                return response()->json([
                    'status' => 200,
                    'data' => [
                        'message' => "Свободныз ПК нет."
                    ]
                ]);
            }

        })->name('set_pc_active');

        Route::middleware(['check_nb'])->group(function () {

            // Route::get('/check_nb', [NBController::class, 'check'])->name('nb.check');
        });

    });
});

Route::prefix('student')->group(function () {
    Route::name('student.')->group(function () {
        Route::middleware(['limitation_ip'])->group(function () {
            Route::middleware(['exam_test_active_question'])->group(function () {
                Route::resource('exams', StudentExamController::class);
                Route::post('set_variant', function (Request $request) {

                    try {

                        \Illuminate\Support\Facades\DB::transaction(function () use ($request){

                            $variant = \App\Models\ExamTestOnStudentAnswerModel::where('id', '=', $request->input('id'))->first();

                            $question = \App\Models\ExamTestOnStudentQuestionModel::where('id', '=', $variant['exam_test_on_stu_ques_id'])->first();

                            // if ($question['status'] == 0) {

                            \Illuminate\Support\Facades\DB::table('exam_test_on_student_answers')->where('exam_test_on_stu_ques_id', '=', $request->input('question_id'))->where('id', '!=', $request->input('id'))->update([
                                'correct_student' => 'NULL'
                            ]);

//                            \Illuminate\Support\Facades\DB::statement("update  set correct_student = 'NULL' where exam_test_on_stu_ques_id = ? AND id != ?", [-1, $request->input('id')]);

                            \Illuminate\Support\Facades\DB::table('exam_test_on_student_answers')->where('exam_test_on_stu_ques_id', '=', $request->input('question_id'))->where('id', '=', $request->input('id'))->update([
                                'correct_student' => 1
                            ]);

//                            \Illuminate\Support\Facades\DB::statement("update exam_test_on_student_answers set correct_student = 1 where exam_test_on_stu_ques_id = ? AND id = ?", [$request->input('question_id'), $request->input('id')]);


                            // }

                            $question->status = 1;

                            $question->save();

                        });

                    }catch (\Exception $e){
                        throw new \Exception($e->getMessage());
                    }

                    return '1';
                })->name('set_variant');
            });

            Route::post('finish_exam_student', function (Request $request) {

                $exam_test_student = \App\Models\ExamTestOnStudentModel::withCount('question_exam_active', 'question_exam_disabled')->where('id', '=', $request->input('id'))->where('status', '=', 0)->first();

                // if ($exam_test_student['question_exam_active_count'] == 0) {

                $exam_test_student->status = 1;

                $exam_test_student->save();

                \App\Models\ExamsContorlPC::where('user_id', '=', $exam_test_student['student_id'])->update([
                    'status' => 0,
                    'user_id' => null
                ]);

                $exam_test_on_student = ExamTestOnStudentModel::where('student_id', '=', $exam_test_student['student_id'])->first();
                $exam_test_on_student->end_date_time = date('Y-m-d H:i:s');
                $exam_test_on_student->save();

                $exam_result = \App\Models\ExamTestOnStudentModel::withCount(['question_exam'])->with(['question_exam' => function ($query) {
                    $query->withCount(['awer']);
                }])->where('id', '=', $request->input('id'))->where('status', '=', 1)->first();

                $count_succes_question = 0;

                $count_rejerect_question = 0;

                foreach ($exam_result['question_exam'] as $item) {
                    if ($item['awer_count'] == 1) {
                        $count_succes_question += 1;
                    } elseif ($item['awer_count'] == 0) {
                        $count_rejerect_question += 1;
                    }
                }

//                $ball = round(($exam_result['exam']['maximum_score'] / $exam_result['question_exam_count']) * $count_succes_question, 1);

                $ball = round(($count_succes_question / $exam_result['question_exam_count']) * 100, 1);

                $exam_result->question_count = $exam_result['question_exam_count'];
                $exam_result->question_success = $count_succes_question;
                $exam_result->question_rejerect = $count_rejerect_question;
                $exam_result->ball = $ball;

                $exam_result->supervisor_question_count = $exam_result['question_exam_count'];
                $exam_result->supervisor_question_success = $count_succes_question;
                $exam_result->supervisor_question_rejerect = $count_rejerect_question;
                $exam_result->supervisor_ball = $ball;

                $exam_result->save();

                return response()->json([
                    'question_count' => $exam_result['question_exam_count'],
                    'question_success' => $count_succes_question,
                    'question_rejerect' => $count_rejerect_question,
                    'ball' => $exam_result->ball
                ]);
                // }

                return '0';
            })->name('finish_exam_student');
        });
    });
});

Route::get('nb_student_login', function () {
    return view('nb_student_login');
})->name('nb_student_login');

Route::resource('nb_student', NBTestStudentController::class);

Route::post('nb_student_login_post', function (Request $request) {

    $request->session()->regenerate();

    if (User::where('hemis_id', '=', $request->input('student_id'))->first()) {
        $request->session()->put('student', User::where('hemis_id', '=', $request->input('student_id'))->first());

    }

    return redirect()->route('nb.student.nb_test_list');

//    return redirect()->route('nb_student_login');
})->name('nb_student_login_post');

Route::prefix('nb')->group(function () {
    Route::name('nb.')->group(function () {
        Route::prefix('student')->group(function () {
            Route::name('student.')->group(function () {
                Route::get('nb_test_list', [StudentTestController::class, 'nb_test_list'])->name('nb_test_list');
                Route::get('nb_test', [StudentTestController::class, 'index'])->name('nb_test');
                Route::post('set_variant', [StudentTestController::class, 'set_variant'])->name('set_variant');
            });
        });
    });
});


//REPORT RECTOR SECTION START
Route::group(['prefix' => 'reports'], function () {
//Students Start
    Route::get('/dean/student/paginate', [ReportDeanController::class, 'paginateStudent'])->name('rectors.report.dean.paginateStudent');
    Route::get('/dean/student', [ReportDeanController::class, 'indexStudent'])->name('rectors.report.dean.indexStudent');
    Route::post('/dean/student/filter', [ReportDeanController::class, 'filterStudent'])->name('rectors.report.dean.filterStudent');
//Students End

//Transfer Student Start
    Route::get('/dean/transfer/paginate', [ReportDeanController::class, 'paginateTransferStudent'])->name('rectors.report.dean.paginateTarnsfer');
    Route::get('/dean/transfer', [ReportDeanController::class, 'indexTransferStudent'])->name('rectors.report.dean.indexTransfer');
    Route::post('/dean/transfer/filter', [ReportDeanController::class, 'filterTransferStudent'])->name('rectors.report.dean.filterTransfer');
//Transfer Student End
});

Route::get('test', [StudentTestController::class, 'nb_test_list']);

Route::get('test_check', function (){
    return response()->json([
        'test11' => 'test1',
        'test12' => 'test2',
        'tes1t32453' => 'test3',
        'tes1t4' => 'test4',
        'test1' => 'test1',
        'tes23451t2' => 'test2',
        'tes1t23453' => 'test3',
        'te1st4' => 'test4',
        'te1st1' => 'test1',
        'tes1532t2' => 'test2',
        'tes11t3' => 'test3',
        'tes11t4' => 'test4',
        'tes11t1' => 'test1',
        'tes1t1322' => 'test2',
        'test113' => 'test3',
        'ttewest4' => 'test4',
        'tesertwt1' => 'test1',
        'testwte2' => 'test2',
        'tes2345weasrtt3' => 'test3',
        'teswertt4' => 'test4',
        'teswertt1' => 'test1',
        'teswertt2' => 'test2',
        'te2345swevrtt3' => 'test3',
        'testwetr4' => 'test4',
        'testwert1' => 'test1',
        'teswvertt2' => 'test2',
        'tesrt3' => 'test3',
        'testwertt4' => 'test4',
        'tewertst1' => 'test1',
        'tesvertt2' => 'test2',
        'testwetr3' => 'test3',
        'testewrt4' => 'test4',
        'testewrt1' => 'test1',
        'testwertt2' => 'test2',
        'teswerfsrtt3' => 'test3',
        'tetewswet4' => 'test4',
        'teswertt1rt' => 'test1',
        'test2w' => 'test2',
        'tester3' => 'test3',
        'teswrett4' => 'test4',
        'teswetrt1' => 'test1',
        'testwert2' => 'test2',
        'testwert3' => 'test3',
        'teswert4' => 'test4',
        'testerqw1' => 'test1',
        'testg2' => 'test2',
        'testgfd3' => 'test3',
        'tesgfdst4' => 'test4',
        'tessdfgt1' => 'test1',
        'tesdgt2' => 'test2',
        'tessdgt3' => 'test3',
        'tessft4' => 'test4',
        'tessfgt1' => 'test1',
        'testsgdf2' => 'test2',
        'testsdfg3' => 'test3',
        'testsdfg4' => 'test4',
        'tesqwesdfgt1' => 'test1',
        'tessdfgt2' => 'test2',
        'testsqwedfg3' => 'test3',
        'testsdgf4' => 'test4',
        'tessdfgtqwe1' => 'test1',
        'testsfdg2' => 'test2',
        'testdsfg3' => 'test3',
        'testsqwedfg4' => 'test4',
        'testsdfg1' => 'test1',
        'testdsfg2' => 'test2',
        'testdsf3' => 'test3',
        'testdsfg4' => 'test4',
        'testrtetw1' => 'test1',
        'testwerqwt2' => 'test2',
        'testwqwert3' => 'test3',
        'testwert4' => 'test4',
        'teswrett1' => 'test1',
        'testwetr2' => 'test2',
        'testwetfqwr3' => 'test3',
        'test4' => 'test4',
        'tesertt1' => 'test1',
        'test2' => 'test2',
        'teswertfat3' => 'test3',
        'testwergft4' => 'test4',
        'testwwe1' => 'test1',
        'tesyertt2' => 'test2',
        'teseyrt3' => 'test3',
        'testerty4' => 'test4',
        'teshdft1' => 'test1',
        'testsdf2' => 'test2',
        'tesbt3' => 'test3',
        'tegsst4' => 'test4',
        'testd1' => 'test1',
        'tessdfgt22' => 'test2',
        'testsfdfg3' => 'test3',
        'tessfgdt4' => 'test4',
        'tessdfg4t1' => 'test1',
        'tessdft2' => 'test2',
        'testgds3' => 'test3',
        'testqwer4' => 'test4',
        'testqwre1' => 'test1',
        'tesqwret2' => 'test2',
        'testqr3' => 'test3',
        'teqwrst4' => 'test4',
        'tesqewrt1' => 'test1',
        'tesqwert2' => 'test2',
        'tesqwert3' => 'test3',
       'asdfqewrads' => 'asdfasdf',
        'tesqwert4' => 'test4'
    ]);
});

Route::get('view_test', function (){
    return view('test');
});
