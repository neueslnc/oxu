<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeRequest extends FormRequest
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
            'subject_id'=>['required'],
            'semester_id'=>['required'],
            'direction_id'=>['required'],
            'theme_name'=>['required','string'],
            'theme_text'=>['required','string']
        ];
    }

    public function passedValidation()
    {
        $this->merge([
            'teacher_id' => $this->user()->id
        ]);
    }
}
