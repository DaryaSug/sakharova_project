@extends('layouts.app')

@section('title', 'Новости (CRUD)')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="color: #5e2aa8;">Список статей (из БД)</h1>
        <a href="{{ route('articles.create') }}" style="background: #5e2aa8; color: #fff; padding: 10px 18px; border-radius: 6px; text-decoration: none; font-weight: bold;">
            + Добавить статью
        </a>
    </div>

    @if(session('success'))
        <div style="padding: 12px; background: #d4edda; color: #155724; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
        @forelse($articles as $article)
            <div style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; background: #fff;">
                <img src="{{ asset($article->preview_image ?? 'preview.jpg') }}" alt="{{ $article->title }}" style="width: 100%; height: 160px; object-fit: cover; border-radius: 6px;">
                <h3 style="color: #5e2aa8; margin: 10px 0;">{{ $article->title }}</h3>
                <p style="font-size: 0.85rem; color: #777;">{{ $article->created_at ? $article->created_at->format('d.m.Y') : '' }}</p>
                <p style="font-size: 0.9rem; color: #555;">{{ $article->short_description }}</p>
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                    <a href="{{ route('articles.show', $article->id) }}" style="color: #5e2aa8; font-weight: bold; text-decoration: none;">Читать</a>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ route('articles.edit', $article->id) }}" style="color: #007bff; text-decoration: none;">Ред.</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Удалить статью?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; padding: 0;">Уд.</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Статей нет.</p>
        @endforelse
    </div>

    <!-- Вывод постраничной навигации (Пагинация) -->
    <div style="margin-top: 30px;">
        {{ $articles->links() }}
    </div>
@endsection