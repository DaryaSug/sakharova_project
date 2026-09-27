<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Просмотр списка статей (доступно всем).
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Просмотр конкретной статьи (доступно всем).
     */
    public function view(?User $user, Article $article): bool
    {
        return true;
    }

    /**
     * Создание статей (только для модераторов).
     */
    public function create(User $user): Response
    {
        return $user->hasRole('moderator')
            ? Response::allow()
            : Response::deny('Только модератор имеет право создавать новости.');
    }

    /**
     * Редактирование статей (только для модераторов).
     */
    public function update(User $user, Article $article): Response
    {
        return $user->hasRole('moderator')
            ? Response::allow()
            : Response::deny('У вас нет прав для редактирования этой статьи.');
    }

    /**
     * Удаление статей (только для модераторов).
     */
    public function delete(User $user, Article $article): Response
    {
        return $user->hasRole('moderator')
            ? Response::allow()
            : Response::deny('Удаление новостей доступно только модераторам.');
    }
}