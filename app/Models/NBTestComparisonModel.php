<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestComparisonModel extends Model
{
    use HasFactory;

    protected $table = "mb_test_comparisons";

    protected $fillable = [
        "block_left_id",
        "block_right_id",
        "mb_test_question_id",
        "delete_status"
    ];

    protected $appends = ['block'];


    public function block_left()
    {

        return $this->hasOne(NBTestComparisonLeftBlockModel::class, 'id', 'block_left_id');
    }

    public function block_right()
    {

        return $this->hasOne(NBTestComparisonRightBlockModel::class, 'id', 'block_right_id');
    }

    public function getBlockAttribute()
    {
        return [
            'block_left' => $this->block_left()->first(),
            'block_right' => $this->block_right()->first()
        ];
    }
}
