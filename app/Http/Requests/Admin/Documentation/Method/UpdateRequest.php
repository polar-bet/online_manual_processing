<?php

namespace App\Http\Requests\Admin\Documentation\Method;

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
            'name' => 'required|string|max:50',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'return' => 'required|string|max:255',
            'documentation_article_id' => 'required|integer|exists:documentation_articles,id',
            'example' => 'required',
            'syntaxes' => 'required|array|nullable|max:5',
            'syntaxes.*' => 'required|string|required|max:100',
            'parameters' => 'required|nullable|array|max:5',
            'parameters.*.name' => 'required|max:50',
            'parameters.*.type' => 'required|max:50',
            'parameters.*.description' => 'required|max:100',
            'related_method_id' => 'array|nullable|max:10',
            'related_method_id.*' => 'integer',
        ];
    }
}
