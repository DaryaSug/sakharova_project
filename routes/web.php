<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/gallery/{id?}', [MainController::class, 'gallery'])->name('gallery');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contacts', function () {
    $contactsData = [
        ['title' => 'Электронная почта', 'value' => 'saxarova-04@mail.ru', 'description' => 'Для официальных запросов'],
        ['title' => 'Телефон', 'value' => '8 (987) 825-87-33', 'description' => 'Пн-Пт с 9:00 до 18:00'],
    ];
    return view('contacts', ['contacts' => $contactsData]);
})->name('contacts');

Route::get('/signin', [AuthController::class, 'create'])->name('signin');
Route::post('/signin', [AuthController::class, 'registration'])->name('signin.post');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::resource('articles', ArticleController::class);