<?php

namespace App\Domain\Deans\Students\Models;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Domain\Directions\Models\Direction;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Domain\StudentCourses\Models\StudentCourse;
use App\Models\Language;
use App\Models\TypeOfEducationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'FIO',
        'phone',
        'language_id',
        'type_of_education_id',
        'form_of_education_id',
        'student_course_id',
        'direction_id',
        'dean_group_id'
    ];

    /**
     * @var int
     */
    protected $perPage = 15;

    /**
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return BelongsTo
     */
    public function type_of_education(): BelongsTo
    {
        return $this->belongsTo(TypeOfEducationModel::class);
    }

    /**
     * @return BelongsTo
     */
    public function form_of_education(): BelongsTo
    {
        return $this->belongsTo(FormOfEducation::class);
    }

    /**
     * @return BelongsTo
     */
    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

    /**
     * @return BelongsTo
     */
    public function student_course(): BelongsTo
    {
        return $this->belongsTo(StudentCourse::class);
    }

    /**
     * @return BelongsTo
     */
    public function dean_group(): BelongsTo
    {
        return $this->belongsTo(DeanGroup::class);
    }
}
