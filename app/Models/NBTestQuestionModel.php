<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class NBTestQuestionModel extends Model
{
    use HasFactory;

    protected $table = 'mb_test_questions';

    protected $fillable = [
        'question',
        'type',
        'waiting_seconds',
        'mb_test_theme_id',
        'delete_status'
    ];

    protected $maps = [
        'question' => 'question_name'
    ];

    protected $hidden = ['question'];

    protected $appends = [
        'question_name',
        'writing',
        'data'
    ];

    public function getQuestionNameAttribute()
    {
        return strip_tags($this->attributes['question']);
    }

    public function getDataAttribute()
    {
        return $this->attributes['question'];
    }

    public function getWritingAttribute()
    {
        return optional($this->variants()->first())->writing;
    }

    public function comparisons (){

        return $this->hasMany(NBTestComparisonModel::class, 'mb_test_question_id', 'id');
    }

    public function block_lefts()
    {

        return $this->hasMany(NBTestComparisonLeftBlockModel::class, 'mb_test_question_id', 'id');
    }

    public function block_rights()
    {

        return $this->hasMany(NBTestComparisonRightBlockModel::class, 'mb_test_question_id', 'id');
    }

    public function variants (){

        return $this->hasMany(NBTestAnswerModel::class, 'mb_test_question_id', 'id');
    }
}
