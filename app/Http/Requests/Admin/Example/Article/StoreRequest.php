<?php

namespace App\Http\Requests\Admin\Example\Article;

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
            'name' => 'required|string|unique:example_articles,name,NULL,id,deleted_at,NULL|max:100',
            'description' => 'required|string|max:5000',
            'image' => 'required|image|mimes:png,jpg,svg,gif,jpeg,webp|max:8192',
            'example' => 'required|string|max:5000',
            'example_type_id' => 'required|integer|exists:example_types,id',
            'featured_functions_id' => 'array',
            'featured_functions_id.*' => 'integer',
        ];
    }
}
