<?php

namespace App\Domain\Deans\Groups\Models;

use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use App\Domain\Directions\Models\Direction;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Domain\StudentCourses\Models\StudentCourse;
use App\Models\AcademicYear;
use App\Models\Language;
use App\Models\TypeOfEducationModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeanGroup extends Model
{
    use HasFactory;

    /**
     * @var int
     */
    protected $perPage = 20;

    protected $with = ['get_direction_id'];

    protected $fillable =
        [
            'title',
            'language_id',
            'type_of_education_id',
            'form_of_education_id',
            'direction_id',
            'group_course_id',
            'group_akademik_year',
            'supervisor_id'
        ];

    protected $maps = [
        'title' => 'name',
    ];

    protected $appends = [
        'name',
        'supervisor_id_old'
    ];

    public function getNameAttribute()
    {
        return $this->attributes['title'];
    }

    public function getSupervisorIdOldAttribute()
    {
        return $this->attributes['supervisor_id'];
    }

    public function get_language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function get_type_of_education_id()
    {
        return $this->belongsTo(TypeOfEducationModel::class, 'type_of_education_id', 'id');
    }

    public function get_form_of_education_id()
    {
        return $this->belongsTo(FormOfEducation::class, 'form_of_education_id', 'id');
    }

    public function get_direction_id()
    {
        return $this->belongsTo(Direction::class, 'direction_id', 'id');
    }

    public function get_group_course_id()
    {
        return $this->belongsTo(StudentCourse::class, 'group_course_id', 'id');
    }

    public function get_group_akademik_year()
    {
        return $this->belongsTo(AcademicYear::class, 'group_akademik_year', 'id');
    }
    public function get_supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'id');
    }

    public function get_students(){

        return $this->hasMany(User::class, 'group_id', 'id');
    }

    public function get_who_came_student(){

        return $this->hasMany(TransferStudentGroup::class, 'transfer_group_id', 'id');
    }

    public function get_departed_student(){

        return $this->hasMany(TransferStudentGroup::class, 'exit_group_id', 'id');
    }
}
