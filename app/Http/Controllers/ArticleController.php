<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Http\Requests\ArticleRequest;
use App\Mail\ArticleCreatedMail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    // READ: Вывод списка статей с пагинацией 
    public function index()
    {
        $articles = Article::latest()->paginate(6);
        return view('articles.index', compact('articles'));
    }

    // CREATE: Отображение формы создания статьи 
    public function create()
    {
        Gate::authorize('create', Article::class);

        return view('articles.create');
    }

    // STORE: Сохранение новой статьи с валидацией и отправкой почты
    public function store(ArticleRequest $request)
    {
        Gate::authorize('create', Article::class);

        // 1. Сохранение статьи в БД
        $article = Article::create($request->validated());

        // 2. Определение адресата (модератор или адрес по умолчанию из config)
        $moderator = User::whereHas('roles', function ($query) {
            $query->where('name', 'moderator');
        })->first();

        $recipientEmail = $moderator ? $moderator->email : config('mail.from.address');

        // 3. Безопасная отправка письма с перехватом ошибок
        try {
            Mail::to($recipientEmail)->send(new ArticleCreatedMail($article));
        } catch (\Exception $e) {
            // Логируем ошибку и при необходимости останавливаем выполнение для отладки
            Log::error('Ошибка отправки почты: ' . $e->getMessage());
            
            // Если письмо не приходит, раскомментируйте строчку ниже, чтобы увидеть ошибку на экране:
            // dd($e->getMessage());
        }

        return redirect()->route('articles.index')->with('success', 'Статья успешно создана!');
    }

    // READ: Просмотр конкретной статьи 
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // EDIT: Отображение формы редактирования 
    public function edit(Article $article)
    {
        Gate::authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    // UPDATE: Обновление статьи с валидацией 
    public function update(ArticleRequest $request, Article $article)
    {
        Gate::authorize('update', $article);

        $article->update($request->validated());

        return redirect()->route('articles.show', $article->id)->with('success', 'Статья обновлена!');
    }

    // DELETE: Удаление статьи 
    public function destroy(Article $article)
    {
        Gate::authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Статья успешно удалена!');
    }
}