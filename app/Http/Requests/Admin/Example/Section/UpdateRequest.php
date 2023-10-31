<?php

namespace App\Http\Requests\Admin\Example\Section;

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
            'name' => 'required|string|max:100|unique:documentation_sections,name,NULL,' . $this->section->id . ',deleted_at,NULL|max:100',
            'description' => 'required|string|max:255',
        ];
    }
}
