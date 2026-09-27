<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

// Публичные маршруты 
Route::get('/', function () {
    return redirect()->route('articles.index'); 
});

// Маршруты регистрации и авторизации 
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Маршрут выхода (только для авторизованных)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Публичный список новостей
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Защищенные маршруты редактирования/создания статей 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

// Просмотр конкретной статьи
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');