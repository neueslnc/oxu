<?php

namespace App\Models;

use App\Domain\Directions\Models\Direction;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemeModel extends Model
{
    use HasFactory;

    protected $table = 'themes';

    protected $fillable=[
        'theme_name',
        'subject_id',
        'theme_text',
        'status',
        'teacher_id',
        'semester_id',
        'direction_id'
    ];

    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }

    public function theme_subject()
    {
        return $this->hasMany(Subject::class, 'id', 'subject_id');
    }

    public function semester()
    {
        return $this->hasOne(Semester::class, 'id', 'semester_id');
    }

    public function direction()
    {
        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }

    public  function theme_mb()
    {
        return $this->hasOne(NBTestThemeModel::class, 'theme_id', 'id')->latest();
    }
}
