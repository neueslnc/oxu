<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Domain\Directions\Models\Direction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestOnStudentModel extends Model
{
    use HasFactory;

    protected $table = "mb_test_on_students";

    protected $fillable = [
        'student_id',
        'teacher_id',
        'subject_id',
        'semester_id',
        'direction_id',
        'ball',
        'max_ball',
        'mb_test_theme_id',
        'status',
        'supervisor_id',
        "finishing_date_time",
        "question_count",
        "supervisor_question_count",
        "pair",
        "end_date_time",
        "date"
    ];

    protected $maps = [
        'created_at' => 'created_date'
    ];

    protected $appends = [
        'created_date'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('d.m.Y H:i:s');
    }

    public function student()
    {

        return $this->hasOne(User::class, 'id', 'student_id');
    }

    public function direction()
    {

        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }

    public function get_supervisor()
    {

        return $this->hasOne(User::class, 'id', 'supervisor_id');
    }

    public function supervisor()
    {

        return $this->hasOne(User::class, 'id', 'supervisor_id');
    }

    public function teacher()
    {

        return $this->hasOne(User::class, 'id', 'teacher_id');
    }

    public function subject()
    {

        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function test()
    {

        return $this->hasOne(NBTestThemeModel::class, 'id', 'mb_test_theme_id');
    }
    public function theme()
    {

        return $this->hasOne(ThemeModel::class, 'id', 'mb_test_theme_id');
    }

    public function date_create()
    {

        return $this->created_at->format('d.m.Y');
    }

    public function test_on_student_question()
    {
        return $this->hasOne(NBTestOnStudentQuestionModel::class, 'mb_test_on_student_id', 'id')->where('status', '=', 0)->oldest();
    }

    public function test_on_student_questions()
    {
        return $this->hasMany(NBTestOnStudentQuestionModel::class, 'mb_test_on_student_id', 'id');
    }

    public function test_on_student_questions_active()
    {
        return $this->hasMany(NBTestOnStudentQuestionModel::class, 'mb_test_on_student_id', 'id')->where('status', '=', 1);
    }

    public function mb_test_theme()
    {
        return $this->hasMany(NBTestThemeModel::class,'id','mb_test_theme_id');
    }

    public function block_lefts()
    {

        return $this->hasMany(NBTestStudentComparisonLeftBlockModel::class, 'mb_t_o_q_id', 'id');
    }

    public function block_rights()
    {

        return $this->hasMany(NBTestStudentComparisonRightBlockModel::class, 'mb_t_o_q_id', 'id');
    }

    public function get_latest_repeat(){

        return $this->hasOne(NbTestOnStudentRepeatModel::class, 'nb_test_on_student_id', 'id')->latest();
    }

    public function get_latest_repeat_pro(){

        return $this->hasOne(NbTestOnStudentRepeatModel::class, 'nb_test_on_student_id', 'id')->whereNotNull('ball')->latest();
    }
}
