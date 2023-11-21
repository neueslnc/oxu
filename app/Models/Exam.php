<?php

namespace App\Models;

use App\Domain\Directions\Models\Direction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "explanation",
        "syllabus_id",
        "control_type_id",
        "status",
        'direction_id',
        'subject_id',
        "start_date",
        "expiration_date",
        "maximum_score",
        "time_limit_minutes",
        "attempts",
        "number_questions",
        "random",
        "academic_year_id",
        "semester_id",
        "science_id",
        "tur"
    ];

    public function semester()
    {
        return $this->hasOne(Semester::class, 'id', 'semester_id');    
    }

    public function academic_year()
    {
        return $this->hasOne(AcademicYear::class, 'id', 'academic_year_id');    
    }

    public function science()
    {
        return $this->hasOne(Sciences::class, 'id', 'science_id');    
    }

    public function control_type()
    {
        return $this->hasOne(ControlTypeExam::class, 'id', 'control_type_id');    
    }

    public function exam_questions()
    {
        return $this->hasMany(ExamTestQuestionModel::class, 'exam_id', 'id');
    }

    public function direction()
    {
        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
