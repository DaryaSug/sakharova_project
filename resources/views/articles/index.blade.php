@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <h1 style="color: #5e2aa8;">Список новостей сайта (из БД)</h1>
    <p>Данные сгенерированы с помощью фабрики Faker и загружены из базы данных.</p>
    <hr>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin-top: 20px;">
        @forelse($articles as $article)
            <div style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; background: #fff; text-align: left;">
                <img src="{{ asset($article->preview_image ?? 'preview.jpg') }}" 
                     alt="{{ $article->title }}" 
                     style="width: 100%; height: 160px; object-fit: cover; border-radius: 6px;">
                
                <h3 style="margin: 12px 0 8px; color: #5e2aa8;">{{ $article->title }}</h3>
                <p style="font-size: 0.85rem; color: #888; margin-bottom: 8px;">
                    Опубликовано: {{ $article->created_at ? $article->created_at->format('d.m.Y H:i') : 'Дата не указана' }}
                </p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.4;">
                    {{ $article->short_description }}
                </p>
                
                <a href="{{ route('articles.show', $article->id) }}" 
                   style="display: inline-block; margin-top: 10px; color: #5e2aa8; font-weight: bold; text-decoration: none;">
                    Читать далее &rarr;
                </a>
            </div>
        @empty
            <p>Новостей пока нет в базе данных. Выполните команду php artisan db:seed</p>
        @endforelse
    </div>
@endsection