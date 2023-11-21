<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NBTestThemeModel extends Model
{
    use HasFactory;

    protected $table = 'mb_test_themes';

    protected $with = ['theme'];

    protected $fillable = [
        'theme_id',
        'user_id',
        'subject_id'
    ];

    protected $appends = [
        'notWritingQuestions'
    ];

    public function questinos_count()
    {
        return $this->hasMany(NBTestQuestionModel::class, 'mb_test_theme_id', 'id')->count();
    }

    public function getNotWritingQuestionsAttribute()
    {
        return $this->hasMany(NBTestQuestionModel::class, 'mb_test_theme_id', 'id')->where('type', '!=', 'writing')->where('delete_status', '=', 0)->count();
    }

    public function active_questinos_count()
    {
        return $this->hasMany(NBTestQuestionModel::class, 'mb_test_theme_id', 'id')->where('delete_status', '=', 0)->count();
    }

    public function questinos()
    {
        return $this->hasMany(NBTestQuestionModel::class, 'mb_test_theme_id', 'id');
    }

    public function date_create()
    {
        return $this->created_at->format('d.m.Y');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function theme()
    {
        return $this->hasOne(ThemeModel::class, 'id', 'theme_id');
    }
}
