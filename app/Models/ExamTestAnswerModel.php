<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTestAnswerModel extends Model
{
    use HasFactory;

    protected $table = 'exam_test_answers';

    protected $fillable = [
        'id',
        'variant',
        'correct',
        'test_question_id'
    ];
}
