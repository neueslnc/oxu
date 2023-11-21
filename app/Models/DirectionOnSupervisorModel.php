<?php

namespace App\Models;

use App\Domain\Directions\Models\Direction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionOnSupervisorModel extends Model
{
    use HasFactory;

    protected $table = 'direction_on_supervisors';

    protected $fillable = [
        'superviosr_id',
        'direction_id',
        'status'
    ];

    public function direction(){

        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }

    public function user(){

        return $this->hasOne(User::class, 'id', 'superviosr_id');
    }
}
