<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sciences extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'syllabus_id', 'semester_id'];
}
