<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Language;
use App\Models\NotificationModel;
use Illuminate\Support\Collection;
use App\Models\TypeOfEducationModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Domain\Directions\Models\Direction;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Domain\Deans\Groups\Models\DeanGroup;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Domain\StudentCourses\Models\StudentCourse;
use App\Domain\FormOfEducations\Models\FormOfEducation;

class StudentsImport implements ToCollection, WithStartRow
{
    /**
     * @var Builder[]|Collection
     */
    private $languages;

    /**
     * @var Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private $groups;

    /**
     * @var Builder[]|Collection
     */
    private $type_of_educations;

    /**
     * @var Builder[]|Collection
     */
    private $form_of_educations;

    /**
     * @var Builder[]|Collection
     */
    private $directions;

    /**
     * @var Builder[]|Collection
     */
    private $student_courses;

    /**
     * @var int
     */
    protected $totalSheetsProcessed = 0;

    /**
     * @var int
     */
    protected $totalRowsProcessed = 0;

    public function __construct()
    {
        $this->groups = DeanGroup::query()->select('id', 'title')->get();
    }


    public function collection(Collection $row)
    {
        $group = $this->groups->where('title', $row[0][0])->pluck('id')->first();
        $group_ = new DeanGroup();
        $group_->title = $row[0][0];
        $group_->save();

        for ($i = 1; $i < (count($row)); $i++) {
            $this->languages = Language::query()->select('id', 'name')->get();
            $this->type_of_educations = TypeOfEducationModel::query()->select('id', 'name')->get();
            $this->form_of_educations = FormOfEducation::query()->select('id', 'title')->get();
            $this->directions = Direction::query()->select('id','status')->selectRaw(('substring(code, 1, 8) code'))->get();
            $this->student_courses = StudentCourse::query()->select('id', 'title')->get();
            $student = new User();
            $direction_ = new Direction();
            $language_ = new Language();
            $type_of_education_ = new TypeOfEducationModel();
            $form_of_education_ = new FormOfEducation();
            $student_course_ = new StudentCourse();

            if (isset($row[$i][4])) {
                $language = $this->languages->where('name', $row[$i][4])->pluck('id')->first();
                if ($language == null) {
                    $language_->name = $row[$i][4];
                    $language_->save();
                    $student->language_id = $language_->id;
                    $group_->language_id = $language_->id;
                } else {
                    $student->language_id = $language;
                    $group_->language_id = $language;
                }
            }
            if (isset($row[$i][5])) {
                $type_of_education = $this->type_of_educations->where('name', $row[$i][5])->pluck('id')->first();
                if ($type_of_education == null) {
                    $type_of_education_->name = $row[$i][5];
                    $type_of_education_->save();
                    $student->type_of_education_id = $type_of_education_->id;
                    $group_->type_of_education_id = $type_of_education_->id;
                } else {
                    $student->type_of_education_id = $type_of_education;
                    $group_->type_of_education_id = $type_of_education;
                }
            }
            if (isset($row[$i][6])) {
                $form_of_education = $this->form_of_educations->where('title', $row[$i][6])->pluck('id')->first();
                if ($form_of_education == null) {
                    $form_of_education_->title = $row[$i][6];
                    $form_of_education_->save();
                    $student->form_of_education_id = $form_of_education_->id;
                    $group_->form_of_education_id = $form_of_education_->id;
                } else {
                    $student->form_of_education_id = $form_of_education;
                    $group_->form_of_education_id = $form_of_education;
                }
            }
            if (isset($row[$i][9])) {
                if($row[$i][5] == 'Kunduzgi'){
                    $direction = $this->directions
                        ->where('code', '=', substr($row[$i][9], 0, 8))
                        ->where('status','=',1)
                        ->first();
                    if ($direction == null) {
                        $direction_->code = substr($row[$i][9], 0, 8);
                        $direction_->title = substr($row[$i][9], 10);
                        if ($form_of_education == null) {
                            $direction_->form_of_education_id = $form_of_education_->id;
                        } else {
                            $direction_->form_of_education_id = $form_of_education;
                        }
                        if ($language == null) {
                            $direction_->language_id = $language_->id;
                        } else {
                            $direction_->language_id = $language;
                        }
                        if ($type_of_education == null) {
                            $direction_->type_of_education_id = $type_of_education_->id;
                        } else {
                            $direction_->type_of_education_id = $type_of_education;
                        }
                        $direction_->dean_id = Auth::user()->id;
                        $direction_->status = 1;
                        $direction_->save();
                        $student->direction_id = $direction_->id;
                        $group_->direction_id = $direction_->id;
                    } else {
                        $student->direction_id = $direction->id;
                        $group_->direction_id = $direction->id;
                    }
                }
                if($row[$i][5] == 'Sirtqi'){
                    $direction = $this->directions
                        ->where('code', '=', substr($row[$i][9], 0, 8))
                        ->where('status', '=', 2)
                        ->first();
                    if ($direction == null) {
                        $direction_->code = substr($row[$i][9], 0, 8);
                        $direction_->title = substr($row[$i][9], 10);
                        if ($form_of_education == null) {
                            $direction_->form_of_education_id = $form_of_education_->id;
                        } else {
                            $direction_->form_of_education_id = $form_of_education;
                        }
                        if ($language == null) {
                            $direction_->language_id = $language_->id;
                        } else {
                            $direction_->language_id = $language;
                        }
                        if ($type_of_education == null) {
                            $direction_->type_of_education_id = $type_of_education_->id;
                        } else {
                            $direction_->type_of_education_id = $type_of_education;
                        }
                        $direction_->dean_id = Auth::user()->id;
                        $direction_->status = 2;
                        $direction_->save();
                        $student->direction_id = $direction_->id;
                        $group_->direction_id = $direction_->id;
                    } else {
                        $student->direction_id = $direction->id;
                        $group_->direction_id = $direction->id;
                    }
                }
                if($row[$i][5] == 'Kechki'){
                    $direction = $this->directions
                        ->where('code', '=', substr($row[$i][9], 0, 8))
                        ->where('status', '=', 3)
                        ->first();
                    if ($direction == null) {
                        $direction_->code = substr($row[$i][9], 0, 8);
                        $direction_->title = substr($row[$i][9], 10);
                        if ($form_of_education == null) {
                            $direction_->form_of_education_id = $form_of_education_->id;
                        } else {
                            $direction_->form_of_education_id = $form_of_education;
                        }
                        if ($language == null) {
                            $direction_->language_id = $language_->id;
                        } else {
                            $direction_->language_id = $language;
                        }
                        if ($type_of_education == null) {
                            $direction_->type_of_education_id = $type_of_education_->id;
                        } else {
                            $direction_->type_of_education_id = $type_of_education;
                        }
                        $direction_->dean_id = Auth::user()->id;
                        $direction_->status = 3;
                        $direction_->save();
                        $student->direction_id = $direction_->id;
                        $group_->direction_id = $direction_->id;
                    } else {
                        $student->direction_id = $direction->id;
                        $group_->direction_id = $direction->id;
                    }
                }
            }
            if (isset($row[$i][8])) {
                $student_course = $this->student_courses->where('title', $row[$i][8])->pluck('id')->first();
                if ($student_course == null) {
                    $student_course_->title = $row[$i][8];
                    $student_course_->save();
                    $student->old_course = $student_course_->id;
                } else {
                    $student->old_course = $student_course;
                }
            }
            if (isset($row[$i][7])) {
                $student->old_direction = $row[$i][7];

                if (!isset($row[$i][9])) {
                    if($row[$i][5] == 'Kunduzgi'){
                        $direction = $this->directions
                            ->where('code', '=', substr($row[$i][7], 0, 8))
                            ->where('status', '=', 1)
                            ->first();
                        if ($direction == null) {
                            $direction_->code = substr($row[$i][7], 0, 8);
                            $direction_->title = substr($row[$i][7], 10);
                            if ($form_of_education == null) {
                                $direction_->form_of_education_id = $form_of_education_->id;
                            } else {
                                $direction_->form_of_education_id = $form_of_education;
                            }
                            if ($language == null) {
                                $direction_->language_id = $language_->id;
                            } else {
                                $direction_->language_id = $language;
                            }
                            if ($type_of_education == null) {
                                $direction_->type_of_education_id = $type_of_education_->id;
                            } else {
                                $direction_->type_of_education_id = $type_of_education;
                            }
                            $direction_->dean_id = Auth::user()->id;
                            $direction_->status = 1;
                            $direction_->save();
                            $student->direction_id = $direction_->id;
                            $group_->direction_id = $direction_->id;
                        } else {
                            $student->direction_id = $direction->id;
                            $group_->direction_id = $direction->id;
                        }
                    }
                    if($row[$i][5] == 'Sirtqi'){
                        $direction = $this->directions
                            ->where('code', '=', substr($row[$i][7], 0, 8))
                            ->where('status', '=', 2)
                            ->first();
                        if ($direction == null) {
                            $direction_->code = substr($row[$i][7], 0, 8);
                            $direction_->title = substr($row[$i][7], 10);
                            if ($form_of_education == null) {
                                                           $direction_->form_of_education_id = $form_of_education_->id;
                            } else {
                                $direction_->form_of_education_id = $form_of_education;
                            }
                            if ($language == null) {
                                $direction_->language_id = $language_->id;
                            } else {
                                $direction_->language_id = $language;
                            }
                            if ($type_of_education == null) {
                                $direction_->type_of_education_id = $type_of_education_->id;
                            } else {
                                $direction_->type_of_education_id = $type_of_education;
                            }
                            $direction_->dean_id = Auth::user()->id;
                            $direction_->status = 2;
                            $direction_->save();
                            $student->direction_id = $direction_->id;
                            $group_->direction_id = $direction_->id;
                        } else {
                            $student->direction_id = $direction->id;
                            $group_->direction_id = $direction->id;
                        }
                    }
                    if($row[$i][5] == 'Kechki'){
                        $direction = $this->directions
                            ->where('code', '=', substr($row[$i][7], 0, 8))
                            ->where('status', '=', 3)
                            ->first();
                        if ($direction == null) {
                            $direction_->code = substr($row[$i][7], 0, 8);
                            $direction_->title = substr($row[$i][7], 10);
                            if ($form_of_education == null) {
                                $direction_->form_of_education_id = $form_of_education_->id;
                            } else {
                                $direction_->form_of_education_id = $form_of_education;
                            }
                            if ($language == null) {
                                $direction_->language_id = $language_->id;
                            } else {
                                $direction_->language_id = $language;
                            }
                            if ($type_of_education == null) {
                                $direction_->type_of_education_id = $type_of_education_->id;
                            } else {
                                $direction_->type_of_education_id = $type_of_education;
                            }
                            $direction_->dean_id = Auth::user()->id;
                            $direction_->status = 3;
                            $direction_->save();
                            $student->direction_id = $direction_->id;
                            $group_->direction_id = $direction_->id;
                        } else {
                            $student->direction_id = $direction->id;
                            $group_->direction_id = $direction->id;
                        }
                    }
                }
            }
            if (isset($row[$i][10])) {
                $student_course = $this->student_courses->where('title', $row[$i][10])->pluck('id')->first();
                if ($student_course == null) {
                    $student_course_->title = $row[$i][10];
                    $student_course_->save();
                    $group_->group_course_id = $student_course_->id;
                } else {
                    $group_->group_course_id = $student_course;
                }
                $student->student_course_id = $row[$i][10];
            }
            if (isset($row[$i][1])) {
                $student->student_id = $row[$i][1];
            }
            if (isset($row[$i][11])) {
                $student->excel_transfer_group = $row[$i][11];
            }
            if (isset($row[$i][2])) {
                $student->full_name = $row[$i][2];
            }
            if (isset($row[$i][3])) {
                $student->number_phone = $row[$i][3];
            }

            if ($group == null) {
                $student->group_id = $group_->id;
            } else {
                $student->group_id = $group;
            }

            $student->level_id = 4;
            $student->hemis_id = null;
            $group_->save();
            $student->save();

            NotificationModel::create([
                'taker_id' => Auth::user()->id,
                'body' => "error ",
                'type' => 2
            ]);

        }

        $this->totalRowsProcessed += count($row);

        NotificationModel::create([
            'taker_id' => Auth::user()->id,
            'body' => "count($this->totalRowsProcessed) ta O'quvchi yaratildi!",
            'type' => 1
        ]);
    }


    public function getTotalSheetsProcessed()
    {
        return $this->totalSheetsProcessed;
    }

    public function getTotalRowsProcessed()
    {
        return $this->totalRowsProcessed;
    }

    // Start reading from row 1 (the first row) of each sheet.
    public function startRow(): int
    {
        return 1;
    }
}
