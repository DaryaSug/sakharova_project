@extends('layouts.app')

@section('title', 'Редактировать статью')

@section('content')
    <a href="{{ route('articles.index') }}" style="color: #5e2aa8; text-decoration: none; font-weight: bold;">&larr; Назад к списку</a>
    <h1 style="color: #5e2aa8; margin-top: 15px;">Редактировать статью</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #ddd; max-width: 600px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>Заголовок:</label><br>
            <input type="text" name="title" value="{{ old('title', $article->title) }}" style="width: 100%; padding: 8px; margin-top: 5px;">
            @error('title') <span style="color: red; font-size: 0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Краткое описание:</label><br>
            <textarea name="short_description" rows="3" style="width: 100%; padding: 8px; margin-top: 5px;">{{ old('short_description', $article->short_description) }}</textarea>
            @error('short_description') <span style="color: red; font-size: 0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Полный текст:</label><br>
            <textarea name="full_text" rows="6" style="width: 100%; padding: 8px; margin-top: 5px;">{{ old('full_text', $article->full_text) }}</textarea>
            @error('full_text') <span style="color: red; font-size: 0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Имя файла картинки:</label><br>
            <input type="text" name="preview_image" value="{{ old('preview_image', $article->preview_image) }}" style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <button type="submit" style="background: #5e2aa8; color: #fff; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">
            Обновить статью
        </button>
    </form>
@endsection