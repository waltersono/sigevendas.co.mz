<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:2',
            // 'surname' => 'required|min:2',
            // 'gender' => 'required|min:1|max:1',
            // 'dob' => 'required',
            // 'email' => 'email|unique:employees',
            // 'contact_1' => 'required|min:9,max:9,unique:employees',
            // 'career_id' => 'required',
            // 'academicLevel_id' => 'required',
            // 'central'   => 'required',
        ];
    }
}
