<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestAnswerModel extends Model
{
    use HasFactory;

    protected $table = 'mb_test_answers';

    protected $fillable = [
        'id',
        'variant',
        'writing',
        'correct',
        'mb_test_question_id',
        'delete_status'
    ];

    protected $maps = [
        'variant' => 'name'
    ];

    protected $casts = [
        'correct' => 'boolean',
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->attributes['variant'];
    }
}
