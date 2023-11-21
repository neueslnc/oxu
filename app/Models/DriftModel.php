<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriftModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'direction_id',
        'semestr_id',
        'type_id',
        'status',
    ];
}
