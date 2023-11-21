<?php

namespace App\Domain\Directions\Models;

use App\Domain\FormOfEducations\Models\FormOfEducation;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Direction extends Model
{
    use HasFactory;

    protected $perPage = 15;

    protected $fillable = [
        'title',
        'code',
        'form_of_education_id',
        'type_of_education_id',
        'dean_id',
        'language_id',
    ];

    public function get_form_of_education(){
        return  $this->belongsTo(FormOfEducation::class,'form_of_education_id','id');
    }
    public function get_language(){
        return  $this->belongsTo(Language::class,'language_id','id');
    }
}
