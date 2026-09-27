<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Метод create: отображает страницу с формой регистрации из auth/signin.blade.php
    public function create()
    {
        return view('auth.signin');
    }

    // Метод registration: принимает данные формы, валидирует их и возвращает JSON
    public function registration(Request $request)
    {
        // 1. Валидация входящих данных
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'name.required'     => 'Поле "Имя" обязательно для заполнения.',
            'email.required'    => 'Поле "Email" обязательно для заполнения.',
            'email.email'       => 'Введите корректный адрес электронной почты.',
            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.min'      => 'Пароль должен быть не менее 6 символов.',
        ]);

        // 2. Собирает данные и возвращает откликом в формате JSON
        return response()->json([
            'status'  => 'success',
            'message' => 'Регистрация прошла успешно!',
            'data'    => [
                'name'     => $validatedData['name'],
                'email'    => $validatedData['email'],
                'password' => $validatedData['password'], // Валидированный пароль
            ]
        ]);
    }
}