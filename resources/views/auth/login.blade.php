@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
    <div style="max-width: 400px; margin: 30px auto; background: #fff; padding: 25px; border-radius: 8px; border: 1px solid #ddd;">
        <h2 style="color: #5e2aa8; text-align: center; margin-bottom: 20px;">Вход в систему</h2>

        @if(session('success'))
            <div style="padding: 10px; background: #d4edda; color: #155724; border-radius: 6px; margin-bottom: 15px; font-size: 0.9rem;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px; margin-top: 5px;">
                @error('email') <span style="color: red; font-size: 0.85rem;">{{ $message }}</span> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Пароль:</label>
                <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
            </div>

            <button type="submit" style="width: 100%; background: #5e2aa8; color: #fff; padding: 10px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">
                Войти
            </button>
        </form>

        <p style="text-align: center; margin-top: 15px; font-size: 0.9rem;">
            Нет аккаунта? <a href="{{ route('register') }}" style="color: #5e2aa8;">Зарегистрироваться</a>
        </p>
    </div>
@endsection