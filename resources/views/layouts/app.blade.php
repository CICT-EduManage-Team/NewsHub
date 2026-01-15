<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
    @yield('styles')
    @vite('resources/css/app.css' )
    @vite('resources/js/app.js')
</head>
<body>
<header class="main-navbar">
    <div class="container navbar-container">
        <div class="navbar-left-side">
            <a href="/" class="navbar-logo"><span class="logo-accent">News</span>Hub</a>
            <nav class="navbar-menu">
                <a class="nav-item-link" href="{{route('news.index')}}">Новости</a>
                @auth
                    <a class="nav-item-link" href="{{route('profile', auth()->id())}}">Мои статьи</a>
                    <a class="nav-item-link" href="{{route('news.create')}}">Добавить статью</a>
                @endauth
            </nav>
        </div>

        <div class="navbar-right-side">
            @auth
                <span class="user-greeting">Привет, <b>{{ auth()->user()->name }}</b></span>
                <a class="btn-logout-custom" href="{{route('logout')}}">Выйти</a>
            @else
                @if(!Route::is('login'))
                    <a class="btn-login-text" href="{{ route('login') }}">Войти</a>
                @endif

                @if(!Route::is('register'))
                    <a class="btn-register-solid" href="{{ route('register') }}">Регистрация</a>
                @endif
            @endauth
        </div>
    </div>
</header>
<div class="container mt-4">
    @yield('content')
</div>
@yield('scripts')


</body>
</html>
