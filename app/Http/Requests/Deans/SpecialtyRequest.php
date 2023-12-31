<?php

namespace App\Http\Requests\Deans;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code'=>['required','numeric'],
            'type'=>['required'],
            'type_of_education_id'=>['required'],
            'name'=>['required']
        ];
    }
}
