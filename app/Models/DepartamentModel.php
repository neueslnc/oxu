<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentModel extends Model
{
    use HasFactory;

    protected $table = "departaments";

    protected $fillable = ['name'];
}