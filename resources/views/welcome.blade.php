<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NewsHub — Добро пожаловать</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>
<body>

<header class="welcome-navbar">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}" class="nav-link">Личный кабинет</a>
        @else
            <a href="{{ route('login') }}" class="nav-link">Войти</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-link nav-link-primary">Начать работу</a>
            @endif
        @endauth
    @endif
</header>

<main class="hero-section">
    <div class="brand-logo">
        <span class="logo-blue">News</span>Hub
    </div>

    <h1 class="hero-title">Вся информация в одном месте</h1>
    <p class="hero-subtitle">
        Современная платформа для публикации новостей и обмена статьями.
        Простой интерфейс, удобный редактор и ничего лишнего.
    </p>

    <div class="features-grid">
        <a href="{{ route('news.index') }}" class="feature-card">
            <h3>Читать новости</h3>
            <p>Будьте в курсе последних событий нашего сообщества.</p>
        </a>
        <a href="{{ route('news.create') }}" class="feature-card">
            <h3>Опубликовать статью</h3>
            <p>Поделитесь своими мыслями с тысячами читателей NewsHub.</p>
        </a>
        <a href="#" class="feature-card">
            <h3>Поиск контента</h3>
            <p>Удобный каталог и фильтрация статей по интересам.</p>
        </a>
    </div>
</main>

<footer class="welcome-footer">
    &copy; {{ date('Y') }} NewsHub. Платформа создана на базе Laravel.
</footer>

</body>
</html>
