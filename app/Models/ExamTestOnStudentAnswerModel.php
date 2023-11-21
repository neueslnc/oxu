<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTestOnStudentAnswerModel extends Model
{
    use HasFactory;

    protected $table = 'exam_test_on_student_answers';

    protected $fillable = [
        'id',
        'variant',
        'correct',
        'correct_student',
        'exam_test_on_stu_ques_id'
    ];
}
