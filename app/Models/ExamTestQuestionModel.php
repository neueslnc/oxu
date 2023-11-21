<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTestQuestionModel extends Model
{
    use HasFactory;

    protected $table = 'exam_test_questions';

    protected $fillable = [
        'question',
        'exam_id'
    ];

    public function variants(){
        return $this->hasMany(ExamTestAnswerModel::class, 'test_question_id', 'id');
    }
}
