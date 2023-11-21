<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NbTestOnStudentRepeatModel extends Model
{
    use HasFactory;

    protected $table = 'nb_test_on_student_repeats';

    protected $fillable = [
        'nb_test_on_student_id',
        'start_date_time',
        'end_date_time',
        'question_success',
        'question_rejerect',
        'copy_question',
        'ball',
        'date'
    ];
}
