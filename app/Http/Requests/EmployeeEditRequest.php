<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeEditRequest extends FormRequest
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
            'first_name' => 'required|string|max:50',

            'email' => 'required|email|unique:users|unique:companies', Rule::unique('employees', 'email')->ignore($this->employee),
            'phone' => 'required|numeric', Rule::unique('employees', 'phone')->ignore($this->employee)
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.email' => 'Invalid Format!',
            'email.unique' => 'Email Sudah ada!',
            'first_name.required' => 'Name is required!',
            'first_name.max' => 'Nama anda terlalu panjang!',
            'first_name.string' => 'Harus String!',

        ];
    }
}
