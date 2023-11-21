<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfEducationModel extends Model
{
    use HasFactory;
    protected $table = 'type_of_education';

    protected $fillable=['name'];
}
