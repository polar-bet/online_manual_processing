<?php

namespace App\Http\Requests\Account\Registration;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email:rfc,dns|string|unique:users,email,NULL,id',
            'password' => 'required|string|confirmed|min:8',
            'avatar' => 'image|mimes:png,jpg,svg,gif,jpeg|nullable|max:3072',
            'role_id' => 'required|integer|not_in:1|exists:roles,id',
        ];
    }
}
