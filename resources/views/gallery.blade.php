@extends('layouts.app')

@section('title', 'Галерея')

@section('content')
    <a href="{{ route('home') }}" style="color: #5e2aa8; text-decoration: none;">&larr; Назад на главную</a>
    
    <h1 style="margin-top: 15px;">Просмотр изображения (Full Image)</h1>

    @if($article)
        <div style="text-align: center; margin-top: 20px; background: #fafafa; padding: 20px; border-radius: 8px;">
            <h2>{{ $article['name'] ?? 'Изображение' }}</h2>
            
            <!-- Полноразмерное изображение full_image -->
            <img src="{{ asset($article['full_image'] ?? 'full.jpeg') }}" 
                 alt="{{ $article['title'] ?? 'Full Image' }}" 
                 style="max-width: 100%; height: auto; max-height: 500px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
            
            <p style="margin-top: 15px; font-size: 1.1rem; color: #333;">{{ $article['description'] ?? '' }}</p>
        </div>
    @else
        <p>Изображение не найдено.</p>
    @endif
@endsection