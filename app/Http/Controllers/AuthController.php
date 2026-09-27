<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Форма регистрации
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Обработка регистрации
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.unique' => 'Пользователь с таким email уже зарегистрирован.',
            'password.confirmed' => 'Пароли не совпадают.',
            'password.min' => 'Пароль должен быть не менее 6 символов.',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Регистрация прошла успешно! Войдите в аккаунт.');
    }

    // Форма входа
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Обработка входа (Аутентификация с токеном Sanctum)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Генерация токена Sanctum
            $token = $user->createToken('auth_token')->plainTextToken;

            // Сохраняем токен в сессии для клиентской части
            session(['sanctum_token' => $token]);

            return redirect()->intended('/articles')->with('success', 'Вы успешно вошли!');
        }

        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ])->onlyInput('email');
    }

    // Выход с удалением токенов и аннулированием сессии
    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            // Удаление всех токенов аутентификации Sanctum
            $user->tokens()->delete();
        }

        Auth::logout();

        // Аннулирование сессии и регенерация CSRF-токена
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Вы вышли из системы.');
    }
}