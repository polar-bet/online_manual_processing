<?php

namespace App\Http\Requests\Admin\Documentation\Article;

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
            'name' => ['required', 'string', 'max:100', 'unique:documentation_articles,name,NULL,id,deleted_at,NULL'],
            'short_description' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'documentation_type_id' => ['required', 'integer', 'exists:documentation_types,id'],
            'return' => ['nullable', 'string', 'max:255'],
            'examples' => ['nullable', 'array', 'max:5'],
            'examples.*' => ['string', 'required'],
            'syntaxes' => ['nullable', 'array', 'max:5'],
            'syntaxes.*' => ['string', 'required', 'max:100'],
            'constructors' => ['nullable', 'array', 'max:5'],
            'constructors.*' => ['string', 'required', 'max:100'],
            'parameters' => ['nullable', 'array', 'max:5'],
            'parameters.*.name' => ['max:50'],
            'parameters.*.type' => ['max:50'],
            'parameters.*.description' => ['max:100'],
            'related_class_id' => ['nullable'],
            'related_class_id.*' => ['integer'],
        ];
    }
}
