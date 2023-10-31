<?php

namespace App\Http\Requests\Admin\Documentation\Article;

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
            'name' => ['required', 'string', 'max:100', 'unique:documentation_articles,name,' . $this->article->id . ',id,deleted_at,NULL'],
            'short_description' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'documentation_type_id' => ['required', 'integer', 'exists:documentation_types,id'],
            'return' => ['nullable', 'string', 'max:255'],
            'examples' => ['nullable'],
            'examples.*' => ['string', 'required'],
            'syntaxes' => ['nullable'],
            'syntaxes.*' => ['string', 'required', 'max:100'],
            'constructors' => ['nullable'],
            'constructors.*' => ['string', 'required', 'max:100'],
            'parameters' => ['nullable'],
            'parameters.name' => ['string', 'max:50'],
            'parameters.type' => ['string','nullable', 'max:50'],
            'parameters.description' => ['string', 'max:100'],
            'related_class_id' => ['nullable', 'array'],
            'related_class_id.*' => ['integer'],
        ];
    }
}
