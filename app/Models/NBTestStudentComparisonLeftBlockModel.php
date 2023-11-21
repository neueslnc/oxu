<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestStudentComparisonLeftBlockModel extends Model
{
    use HasFactory;

    protected $table = 'mb_test_student_comparison_left_blocks';

    protected $fillable = [
        "name",
        "mb_t_o_q_id"
    ];
}
