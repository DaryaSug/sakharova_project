<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Разрешаем выполнение запроса
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'full_text' => 'required|string',
            'preview_image' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Заголовок статьи обязателен для заполнения.',
            'short_description.required' => 'Укажите краткое описание.',
            'full_text.required' => 'Введите полный текст статьи.',
        ];
    }
}