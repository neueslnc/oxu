<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestStudentComparisonModel extends Model
{
    use HasFactory;

    protected $table = 'mb_test_student_comparisons';

    protected $fillable = [
        "st_block_left_id",
        "st_block_right_id",
        "mb_test_on_student_qt_id"
    ];

    public function block_lefts()
    {

        return $this->hasMany(NBTestStudentComparisonLeftBlockModel::class, 'id', 'st_block_left_id');
    }

    public function block_rights()
    {

        return $this->hasMany(NBTestStudentComparisonRightBlockModel::class, 'id', 'st_block_right_id');
    }
}
