<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamsContorlPC extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'store',
        'nomer',
        'user_id',
        'local_ip',
        'status'
    ];
}
