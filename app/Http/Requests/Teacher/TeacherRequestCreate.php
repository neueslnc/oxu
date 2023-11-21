<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequestCreate extends FormRequest
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

    // protected function prepareForValidation()
    // {
    //     dd($this->all());
    // }

    public function rules(): array
    {
        return [
            'full_name' => ['required'],
            'subjects' => ['required'],
            'login' => ['required', 'unique:users,login'],
            'password' => ['required', 'confirmed']
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'departament_id' => $this->user()->departament_id,
        ]);

    }
}
