<?php

namespace App\Http\Requests\SuperVisirosExam\ContorlPC;

use Illuminate\Foundation\Http\FormRequest;

class ControlPCCreate extends FormRequest
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
            'name' => ['required'],
            'nomer' => ['required', 'unique:exams_contorl_p_c_s,nomer'],
            'local_ip' => ['required', 'unique:exams_contorl_p_c_s,local_ip'],
        ];
    }

    public function passedValidation()
    {
        $this->merge([
            'teacher_id' => $this->user()->id
        ]);
    }
}
