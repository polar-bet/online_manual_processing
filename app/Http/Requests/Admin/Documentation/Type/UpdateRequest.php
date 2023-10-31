<?php

namespace App\Http\Requests\Admin\Documentation\Type;

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
            'name' => ['required','string','unique:documentation_types,name,' . $this->type->id,',id,deleted_at,NULL|max:50'],
            'documentation_section_id' => 'required|integer|exists:documentation_sections,id',
        ];
    }
}
