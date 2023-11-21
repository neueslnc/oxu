<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTestOnStudentModel extends Model
{
    use HasFactory;

    protected $table = "exam_test_on_students";

    protected $fillable = [
        'student_id',
        'exam_id',
        'status',
        'question_count',
        'question_success',
        'question_rejerect',
        'start_date_time',
        'end_date_time',
        'finishing_date_time',
        'ball',
        'supervisor_view',
        'supervisor_question_count',
        'supervisor_question_success',
        'supervisor_question_rejerect',
        'supervisor_ball'
    ];

    public function student()
    {
        return $this->hasOne(User::class, 'id', 'student_id');
    }

    public function exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }

    public function date_create()
    {
        return $this->created_at->format('d.m.Y');
    }

    public function question_exam (){
        return $this->hasMany(ExamTestOnStudentQuestionModel::class, 'exam_test_on_student_id', 'id');
    }

    public function question_exam_active(){
        return $this->hasMany(ExamTestOnStudentQuestionModel::class, 'exam_test_on_student_id', 'id')->where('status', '=', 0);
    }

    public function question_exam_disabled(){
        return $this->hasMany(ExamTestOnStudentQuestionModel::class, 'exam_test_on_student_id', 'id')->where('status', '=', 1);
    }

}
