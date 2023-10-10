<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','unique:permissions'],
        ];

    }

    public function messages()
    {
        return [

            'name.required' => 'Please enter a permission name',
            'name.unique' => 'Permission already exists',

        ];
    }
}
