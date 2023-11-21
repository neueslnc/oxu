<?php

namespace App\Models;

use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'expiration_date'];

    public function get_group_student()
    {
        return $this->hasMany(DeanGroup::class, 'group_akademik_year', 'id');
    }
}
