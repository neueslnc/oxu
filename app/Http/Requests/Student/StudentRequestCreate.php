<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequestCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required'],
            'image' =>     ['required','mimes:jpg,jpeg','max:5120'],
            'group_id' =>  ['required'],
            'student_id' =>  ['required'],
            'login' =>     ['required', 'unique:users,login'],
            'password' =>  ['required', 'confirmed']
        ];
    }
}
