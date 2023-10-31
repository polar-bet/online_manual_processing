<?php

namespace App\Http\Requests\Admin\Theme;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\File\File;

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
            'title' => 'required|string|max:100',
            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Видаляємо HTML-теги за допомогою регулярного виразу
                    $textWithoutTags = preg_replace("/<.*?>/", "", $value);

                    // Перевіряємо, чи є результат після видалення тегів порожнім
                    if (empty(trim($textWithoutTags))) {
                        $fail('Опис не може містити тільки HTML-теги.');
                    }
                },
            ],
        ];
    }
}
