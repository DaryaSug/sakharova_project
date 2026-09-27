<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    // READ: Вывод списка статей с пагинацией (по 6 штук на страницу)
    public function index()
    {
        $articles = Article::latest()->paginate(6);
        return view('articles.index', compact('articles'));
    }

    // CREATE: Отображение формы создания статьи (только для модераторов)
    public function create()
    {
        Gate::authorize('create', Article::class);

        return view('articles.create');
    }

    // STORE: Сохранение новой статьи с валидацией (только для модераторов)
    public function store(ArticleRequest $request)
    {
        Gate::authorize('create', Article::class);

        Article::create($request->validated());

        return redirect()->route('articles.index')->with('success', 'Статья успешно создана!');
    }

    // READ: Просмотр конкретной статьи (доступно всем)
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // EDIT: Отображение формы редактирования (только для модераторов)
    public function edit(Article $article)
    {
        Gate::authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    // UPDATE: Обновление статьи с валидацией (только для модераторов)
    public function update(ArticleRequest $request, Article $article)
    {
        Gate::authorize('update', $article);

        $article->update($request->validated());

        return redirect()->route('articles.show', $article->id)->with('success', 'Статья обновлена!');
    }

    // DELETE: Удаление статьи (только для модераторов)
    public function destroy(Article $article)
    {
        Gate::authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Статья успешно удалена!');
    }
}