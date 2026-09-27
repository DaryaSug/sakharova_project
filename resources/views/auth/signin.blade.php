@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div style="max-width: 450px; margin: 30px auto; padding: 25px; border: 1px solid #ddd; border-radius: 8px; background: #fff;">
        <h2 style="text-align: center; color: #5e2aa8; margin-bottom: 20px;">Регистрация пользователя</h2>

        <!-- Вывод ошибок валидации -->
        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px 15px; border-radius: 6px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('signin.post') }}" method="POST">
            <!-- CSRF токен для безопасности -->
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Имя:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                       style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                       style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Пароль:</label>
                <input type="password" id="password" name="password" 
                       style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" required>
            </div>

            <button type="submit" 
                    style="width: 100%; background: #5e2aa8; color: #fff; border: none; padding: 10px; border-radius: 4px; font-size: 1rem; cursor: pointer;">
                Зарегистрироваться
            </button>
        </form>
    </div>
@endsection