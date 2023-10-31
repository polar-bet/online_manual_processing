<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

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
                 'name' => 'required|string|max:255|unique:roles,name,' . $this->role->id . ',id,deleted_at,NULL',
                 'status' => 'nullable|string|max:255|in:user,admin,moderator',
        ];
    }
}
