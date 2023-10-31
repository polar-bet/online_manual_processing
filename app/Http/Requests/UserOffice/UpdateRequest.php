<?php

namespace App\Http\Requests\UserOffice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'email' => ['string', 'email:rfc,dns', 'required', "unique:users,email," . $this->user()->id . ',id'],
            'avatar' => 'image|mimes:png,jpg,svg,gif,jpeg|nullable|max:3072',
            'role_id' => ['integer', 'not_in:1', 'exists:roles,id', ($this->user()->id == 1 ? 'nullable' : 'required')],
        ];
    }
}
