<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    // READ: Вывод списка статей с пагинацией (по 6 штук на страницу)
    public function index()
    {
        $articles = Article::latest()->paginate(6);
        return view('articles.index', compact('articles'));
    }

    // CREATE: Отображение формы создания статьи
    public function create()
    {
        return view('articles.create');
    }

    // STORE: Сохранение новой статьи с валидацией
    public function store(ArticleRequest $request)
{
    Article::create($request->validated());

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
        return view('articles.edit', compact('article'));
    }

    // UPDATE: Обновление статьи с валидацией
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->validated());

        return redirect()->route('articles.show', $article->id)->with('success', 'Статья обновлена!');
    }

    // DELETE: Удаление статьи
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Статья успешно удалена!');
    }
}