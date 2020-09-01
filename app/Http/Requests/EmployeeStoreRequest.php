<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'last_name' => 'string|max:50',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|number',
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
