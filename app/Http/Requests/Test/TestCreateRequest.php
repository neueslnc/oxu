<?php

namespace App\Http\Requests\Test;

use Illuminate\Foundation\Http\FormRequest;

class TestCreateRequest extends FormRequest
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
            "theme_id" => ['required'],
            "data" => ['required'],
            "subject_id" => ['required']
        ];
    }
}
