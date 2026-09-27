<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая статья на сайте</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #e0e0e0;">
        <h2 style="color: #5e2aa8; margin-top: 0;">Уведомление модератору</h2>
        <p style="font-size: 16px; color: #3c3c3c;">На сайте была добавлена новая статья:</p>

        <div style="background: #f9f9f9; padding: 15px; border-left: 4px solid #5e2aa8; margin: 20px 0;">
            <h3 style="margin: 0 0 10px 0; color: #3c3c3c;">{{ $article->title }}</h3>
            <p style="margin: 0; color: #767676; font-size: 14px;">
                {{ $article->short_description ?? Str::limit($article->content, 120) }}
            </p>
        </div>

        <p style="font-size: 14px; color: #767676;">
            <strong>Дата создания:</strong> {{ $article->created_at ? $article->created_at->format('d.m.Y H:i') : date('d.m.Y H:i') }}
        </p>

        <div style="margin-top: 25px;">
            <a href="{{ route('articles.show', $article->id) }}" 
               style="background-color: #5e2aa8; color: #ffffff; padding: 10px 18px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                Посмотреть статью на сайте
            </a>
        </div>
    </div>

</body>
</html>