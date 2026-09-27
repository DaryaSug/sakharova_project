<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Запускаем сидер ролей и пользователей
        $this->call(RoleAndUserSeeder::class);

        // 2. Создаем тестовые статьи
        Article::factory(10)->create();
    }
}