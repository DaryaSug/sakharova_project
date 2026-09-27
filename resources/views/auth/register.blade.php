@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div style="max-width: 400px; margin: 30px auto; background: #fff; padding: 25px; border-radius: 8px; border: 1px solid #ddd;">
        <h2 style="color: #5e2aa8; text-align: center; margin-bottom: 20px;">Регистрация</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Имя:</label>
                <input type="text" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 8px; margin-top: 5px;">
                @error('name') <span style="color: red; font-size: 0.85rem;">{{ $message }}</span> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px; margin-top: 5px;">
                @error('email') <span style="color: red; font-size: 0.85rem;">{{ $message }}</span> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Пароль:</label>
                <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
                @error('password') <span style="color: red; font-size: 0.85rem;">{{ $message }}</span> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Подтверждение пароля:</label>
                <input type="password" name="password_confirmation" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </div>

            <button type="submit" style="width: 100%; background: #5e2aa8; color: #fff; padding: 10px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">
                Зарегистрироваться
            </button>
        </form>

        <p style="text-align: center; margin-top: 15px; font-size: 0.9rem;">
            Уже есть аккаунт? <a href="{{ route('login') }}" style="color: #5e2aa8;">Войти</a>
        </p>
    </div>
@endsection