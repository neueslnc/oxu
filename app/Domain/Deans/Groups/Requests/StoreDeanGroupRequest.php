<?php

namespace App\Domain\Deans\Groups\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeanGroupRequest extends FormRequest
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
            'title' => 'required',
            'language_id'=>'required',
            'type_of_education_id'=>'required',
            'form_of_education_id'=>'required',
            'direction_id'=>'required',
            'group_course_id'=>'required',
            'group_akademik_year'=>'required',
        ];
    }
}
