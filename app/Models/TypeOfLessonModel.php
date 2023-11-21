<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfLessonModel extends Model
{
    use HasFactory;
    protected $table='type_of_lesson';
    protected $fillable=[
        'type_name',
    ];
}
