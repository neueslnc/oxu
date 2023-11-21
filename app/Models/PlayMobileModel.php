<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayMobileModel extends Model
{
    use HasFactory;
    protected $fillable = ['sender_id', 'sms_body', 'taker_id','message_id'];

    public function user_sender(){
        return $this->belongsTo(User::class,'sender_id','id');
    }
    public function user_taker(){
        return $this->belongsTo(User::class,'taker_id','id');
    }
}
