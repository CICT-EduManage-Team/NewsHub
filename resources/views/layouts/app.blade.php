<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @yield('styles')
</head>
<body>
<div class="container d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
        <span class="fs-4">NewsHub</span> </a>
    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{route('news.index')}}">Новости на сайте</a>
        @auth
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="#">Мои статьи</a>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{route('news.create')}}">Добавить статью</a>
        @endauth
        <a class="py-2 link-body-emphasis text-decoration-none" href="{{ route('login') }}">Войти</a></nav>
</div>
<div class="container mt-4">
    @yield('content')
</div>
@yield('scripts')
</body>
</html>
