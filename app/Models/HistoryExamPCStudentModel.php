<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryExamPCStudentModel extends Model
{
    use HasFactory;

    protected $table= 'history_exam_p_c_student';

    protected $fillable = [
        'exam_pc_id',
        'student_id'
    ];
}
