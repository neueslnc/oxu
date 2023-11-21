<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroupOnExamModel extends Model
{
    use HasFactory;

    protected $fillable = ['student_group', 'exam'];
}
