<?php

namespace App\Http\Requests\Exam;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        // dd($this->all());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', "max:255"],
            'explanation' => ['required', 'string', "max:255"],
            'control_type_id' => ['required', 'numeric', Rule::in(['1', '2'])],
            'status' => ['required', 'numeric', Rule::in(['1', '2'])],
            // 'random' => ['required', 'numeric', Rule::in(['1', '2'])],
            'start_date' => ['required', 'date_format:Y-m-d H:i'],
            'expiration_date' => ['required', 'date_format:Y-m-d H:i'],
            'maximum_score' => ['required', 'numeric', 'digits_between:1,11'],
            'time_limit_minutes' => ['required', 'numeric', 'digits_between:1,11'],
            'number_questions' => ['required', 'numeric', 'digits_between:1,11'],
            'academic_year_id' => ['required', 'numeric', 'digits_between:1,11'],
            // 'syllabus_id' => ['required', 'numeric'],
            'semester_id' => ['required', 'numeric'],
            'direction_id' => ['required', 'numeric'],
            'subject_id' => ['required', 'numeric'],
            'tur' => ['required']
        ];
    }
}
