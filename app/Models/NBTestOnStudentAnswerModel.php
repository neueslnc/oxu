<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestOnStudentAnswerModel extends Model
{
    use HasFactory;

    protected $table = 'mb_test_on_student_answers';

    protected $fillable = [
        'id',
        'variant',
        'writing',
        'writing_student',
        'correct',
        'correct_student',
        'mb_test_on_stu_ques_id'
    ];
}
