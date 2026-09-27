<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Курсовой проект')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #3c3c3c;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #5e2aa8;
            color: #ffffff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        header nav a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 20px;
            font-size: 1.1rem;
        }
        header nav a:hover {
            color: #a27dd9;
        }
        main {
            flex: 1;
            max-width: 900px;
            width: 100%;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #3c3c3c;
            color: #ffffff;
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }
        .contact-card {
            background-color: #f9f9f9;
            border-left: 4px solid #5e2aa8;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <!-- Header: Меню -->
    <header>
        <div class="logo">Laravel Project</div>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('about') }}">О нас</a>
            <a href="{{ route('contacts') }}">Контакты</a>
            <a href="{{ route('signin') }}">Регистрация</a>
        </nav>
    </header>

    <!-- Основная часть сайта -->
    <main>
        @yield('content')
    </main>

    <!-- Footer: ФИО и группа -->
    <footer>
        <p>Разработчик: <strong>Сахарова Дарья Алексеевна</strong> | Группа: <strong>243-321</strong></p>
    </footer>

</body>
</html>