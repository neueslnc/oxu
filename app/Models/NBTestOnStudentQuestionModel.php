<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestOnStudentQuestionModel extends Model
{
    use HasFactory;

    protected $table = "mb_test_on_student_questions";

    protected $fillable = [
        'mb_test_on_student_id',
        'mb_test_question_id',
        'comparisons_copy',
        'question',
        'type',
        'waiting_seconds',
        'status'
    ];

    public function test_on_student_answers()
    {
        return $this->hasMany(NBTestOnStudentAnswerModel::class, 'mb_test_on_stu_ques_id', 'id');    

    }

    public function comparisons (){

        return $this->hasMany(NBTestStudentComparisonModel::class, 'mb_test_on_student_qt_id', 'id');
    }

    public function awer()
    {
        return $this->hasMany(NBTestOnStudentAnswerModel::class, 'mb_test_on_stu_ques_id', 'id')->where('correct', '=', 1)->where('correct_student', '=', 1);
    }

    public function block_lefts()
    {
        
        return $this->hasMany(NBTestStudentComparisonLeftBlockModel::class, 'mb_t_o_q_id', 'id');
    }

    public function block_rights()
    {
        
        return $this->hasMany(NBTestStudentComparisonRightBlockModel::class, 'mb_t_o_q_id', 'id');
    }
}
