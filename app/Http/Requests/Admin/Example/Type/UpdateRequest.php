<?php

namespace App\Http\Requests\Admin\Example\Type;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:example_types,name,NULL,' . $this->type->id . ',deleted_at,NULL|max:50',
            'example_section_id' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'name' => "назва типу",
            'example_section_id' => "розділ",
        ];
    }
}
