<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTestOnStudentQuestionModel extends Model
{
    use HasFactory;

    protected $table = "exam_test_on_student_questions";

    protected $fillable = [
        'exam_test_on_student_id',
        'exam_test_question_id',
        'question',
        'ball',
        'type',
        'waiting_seconds',
        'status'
    ];



    protected $maps = [
        'waiting_seconds' => 'count_success'
    ];

    protected $appends = [
        'count_success'
    ];

    public function getCountSuccessAttribute()
    {
        return $this->awer()->count();
    }

    public function test_on_student_answers()
    {
        return $this->hasMany(ExamTestOnStudentAnswerModel::class, 'exam_test_on_stu_ques_id', 'id');

    }

    public function variants()
    {
        return $this->hasMany(ExamTestOnStudentAnswerModel::class, 'exam_test_on_stu_ques_id', 'id');
    }

    public function awer()
    {
        return $this->hasMany(ExamTestOnStudentAnswerModel::class, 'exam_test_on_stu_ques_id', 'id')->where('correct', '=', 1)->where('correct_student', '=', 1);
    }
}
