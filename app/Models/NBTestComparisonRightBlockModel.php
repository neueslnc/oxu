<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestComparisonRightBlockModel extends Model
{
    use HasFactory;

    protected $table = "mb_test_comparison_right_blocks";

    protected $fillable = [
        "name",
        "mb_test_question_id"
    ];
}
