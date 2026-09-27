@extends('layouts.app')

@section('title', 'Главная — Список материалов')

@section('content')
    <h1>Каталог материалов (из JSON)</h1>
    <p>Кликните по превью-изображению, чтобы открыть полноразмерную галерею.</p>
    <hr>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
        @forelse($articles as $index => $article)
            <div style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; background: #fff; text-align: center;">
                <!-- Передаем индекс элемента как ID в галерею -->
                <a href="{{ route('gallery', ['id' => $index]) }}">
                    <img src="{{ asset($article['preview_image'] ?? 'preview.jpg') }}" 
                         alt="{{ $article['name'] ?? 'Превью' }}" 
                         style="max-width: 100%; height: 180px; object-fit: cover; border-radius: 6px; transition: transform 0.2s;"
                         onmouseover="this.style.transform='scale(1.03)'" 
                         onmouseout="this.style.transform='scale(1)'">
                </a>
                
                <h3 style="margin: 15px 0 10px; color: #5e2aa8;">{{ $article['name'] ?? 'Без названия' }}</h3>
                <p style="font-size: 0.85rem; color: #888; margin-bottom: 5px;">{{ $article['date'] ?? '' }}</p>
                <p style="font-size: 0.9rem; color: #555;">{{ $article['shortDesc'] ?? $article['desc'] ?? '' }}</p>
            </div>
        @empty
            <p>Данные из файла JSON не найдены или файл пуст.</p>
        @endforelse
    </div>
@endsection