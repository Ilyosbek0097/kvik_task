<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'date_of_birth' => 'required|string',
            'zip_code' => 'required|string'
        ];
    }

    public function attributes()
    {

        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'phone' => 'Phone Number',
            'date_of_birth' => 'Date Of Birth ',
            'zip_code' => 'Zip Code'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name Empty',
            'first_name.string' => 'First Name Type String',
            'last_name.required' => 'Last Name Empty',
            'address.required' => 'Address Empty',
            'phone.required' => 'Phone Number Empty',
            'date_of_birth.required' => 'Date Of Birth Empty',
            'zip_code.required' => 'Zip Code Empty'
        ];
    }
}
