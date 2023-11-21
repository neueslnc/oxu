<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTestThemeModel extends Model
{
    use HasFactory;

    protected $table = 'exam_test_themes';

    protected $fillable = [
        'name'
    ];
}
