@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <a href="{{ route('articles.index') }}" style="color: #5e2aa8; text-decoration: none; font-weight: bold;">&larr; Назад к списку новостей</a>
    
    <div style="margin-top: 20px; background: #fff; padding: 25px; border-radius: 8px; border: 1px solid #ddd;">
        <h1 style="color: #5e2aa8;">{{ $article->title }}</h1>
        <p style="color: #777; font-size: 0.85rem;">Опубликовано: {{ $article->created_at ? $article->created_at->format('d.m.Y H:i') : '' }}</p>
        
        <div style="margin: 20px 0;">
            <img src="{{ asset($article->preview_image ?? 'preview.jpg') }}" alt="{{ $article->title }}" style="max-width: 100%; max-height: 400px; border-radius: 8px;">
        </div>
        
        <div style="font-size: 1.05rem; line-height: 1.6; color: #333;">
            {!! nl2br(e($article->full_text)) !!}
        </div>
    </div>
@endsection