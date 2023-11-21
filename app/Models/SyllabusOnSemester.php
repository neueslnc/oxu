<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyllabusOnSemester extends Model
{
    use HasFactory;

    protected $fillable = [
        'syllabus_id',
        'semester_id'
    ];

    // protected $with = ['syllabus', 'semester'];

    public function syllabus() 
    {
        return $this->hasOne(Syllabus::class, 'id', 'syllabus_id');    
    }

    public function semester() 
    {
        return $this->hasOne(Semester::class, 'id', 'semester_id');    
    }
}
