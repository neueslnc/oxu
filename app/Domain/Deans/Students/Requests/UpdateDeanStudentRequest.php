<?php

namespace App\Domain\Deans\Students\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeanStudentRequest extends FormRequest
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
            'full_name' => 'required',
            'number_phone' => 'required',
            'language_id' => 'required',
            'type_of_education_id' => 'required',
            'form_of_education_id' => 'required',
            'direction_id' => 'required',
            'group_id' => 'required',
            'student_course_id' => 'required',
        ];
    }
}
