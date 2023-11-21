<?php

namespace App\Domain\Deans\TransferStudentGroup\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransferStudentGroupRequest extends FormRequest
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
            'student_id' => 'required',
            'exit_direction_id' => 'nullable',
            'transfer_direction_id' => 'nullable',
            'exit_group_id' => 'nullable',
            'transfer_group_id' => 'nullable',
            'file' => 'mimes:doc,docx,xlsx,pdf|max:5000'
        ];
    }
}
