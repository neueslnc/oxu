<?php

namespace App\Domain\Deans\TransferStudentGroup\Models;

use App\Domain\Deans\Groups\Models\DeanGroup;
use App\Models\User;
use App\Domain\Directions\Models\Direction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransferStudentGroup extends Model
{
    use HasFactory;

    protected $perPage = 15;

    protected $fillable = [
        'student_id',
        'exit_direction_id',
        'transfer_direction_id',
        'exit_group_id',
        'transfer_group_id',
        'date',
        'status',
    ];

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class,'student_id','id');

    }

    /**
     * @return BelongsTo
     */
    public function exit_group(): BelongsTo
    {
        return $this->belongsTo(DeanGroup::class,'exit_group_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function transfer_group(): BelongsTo
    {
        return $this->belongsTo(DeanGroup::class,'transfer_group_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function exit_direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class,'exit_direction_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function transfer_direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class,'transfer_direction_id','id');
    }
}
