<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'             => fake()->sentence(5),              // Заголовок из 5 слов
            'short_description' => fake()->paragraph(2),             // Краткий анонс
            'full_text'         => fake()->paragraphs(4, true),      // Полный текст
            'preview_image'     => 'preview.jpg',                    // Изображение по умолчанию
        ];
    }
}