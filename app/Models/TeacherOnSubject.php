<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherOnSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id'
    ];

    public function user() 
    {
        return $this->hasOne(User::class, 'id', 'user_id');    
    }

    public function subject() 
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');    
    }
}
