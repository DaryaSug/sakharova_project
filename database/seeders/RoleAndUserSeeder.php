<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Создаем роли
        $moderatorRole = Role::firstOrCreate(
            ['name' => 'moderator'],
            ['title' => 'Модератор']
        );

        $readerRole = Role::firstOrCreate(
            ['name' => 'reader'],
            ['title' => 'Читатель']
        );

        // 2. Создаем пользователя-модератора
        $moderator = User::firstOrCreate(
            ['email' => 'moderator@example.com'],
            [
                'name' => 'Модератор Сайта',
                'password' => Hash::make('password123'),
            ]
        );
        $moderator->roles()->syncWithoutDetaching([$moderatorRole->id]);

        // 3. Создаем обычного пользователя-читателя
        $reader = User::firstOrCreate(
            ['email' => 'reader@example.com'],
            [
                'name' => 'Обычный Читатель',
                'password' => Hash::make('password123'),
            ]
        );
        $reader->roles()->syncWithoutDetaching([$readerRole->id]);
    }
}