<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ArticleCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    // Публичное свойство будет автоматически доступно в Blade-шаблоне
    public Article $article;

    /**
     * Передаем модель Article в конструктор
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Реализация метода build для настройки темы, отправителя и шаблона
     */
    public function build()
    {
        return $this->subject('Опубликована новая статья: ' . $this->article->title)
                    ->view('emails.article_created');
    }
}