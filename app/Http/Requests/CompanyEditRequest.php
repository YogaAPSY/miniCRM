<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyEditRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email|unique:employees,email', Rule::unique('companies' . 'email')->ignore($this->company),
            'logo' => 'required|min:100',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.email' => 'Invalid Format!',

            'name.required' => 'Name is required!',
            'name.max' => 'Nama anda terlalu panjang!',
            'name.string' => 'Harus String!',
            'logo.required' => 'Logo is required!',
            'logo.min' => 'Min file 100x100!',
        ];
    }
}
