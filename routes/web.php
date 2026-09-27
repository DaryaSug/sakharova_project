<?php

use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', function () {
    return view('home');
})->name('home');

// Страница "О нас"
Route::get('/about', function () {
    return view('about');
})->name('about');

// Страница "Контакты" с передачей динамического массива данных
Route::get('/contacts', function () {
    $contactsData = [
        [
            'title' => 'Электронная почта',
            'value' => 'saxarova-04@mail.ru',
            'description' => 'Для официальных запросов и предложений'
        ],
        [
            'title' => 'Телефон',
            'value' => '8 (987) 825-87-33',
            'description' => 'Пн-Пт с 9:00 до 18:00'
        ],
        [
            'title' => 'Главный офис',
            'value' => 'г. Москва, ул. Академика Королева, д. 12',
            'description' => 'Прием посетителей по предварительной записи'
        ]
    ];

    return view('contacts', ['contacts' => $contactsData]);
})->name('contacts');