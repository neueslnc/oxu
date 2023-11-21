<?php

namespace App\Domain\Supervisors\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupervisorRequest extends FormRequest
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
            'user_id' => 'required',
            'semester_id' => 'required',
            'direction_id' => 'required',
            'science_id' => 'required',
            'subject_id' => 'required',
            'date' => 'required',
        ];
    }
}
