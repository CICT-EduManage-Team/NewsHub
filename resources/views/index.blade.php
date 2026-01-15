@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="main-page-wrapper">
        <div class="content-header text-center">
            <h1 class="display-title">Добро пожаловать в NewsHub</h1>
            <p class="subtitle-text">Познакомьтесь с нашими авторами и их публикациями</p>
        </div>

        <div class="users-section">
            <h2 class="section-title">Авторы сообщества</h2>

            <div class="users-grid">
                @foreach($users as $user)
                    <a href="{{route('profile', $user->id)}}" class="user-card-link">
                        <div class="user-card">
                            <div class="user-avatar">
                                {{ mb_substr($user->name, 0, 1) }}
                            </div>
                            <div class="user-info">
                                <h3 class="user-name">{{ $user->name }}</h3>
                                <p class="user-email">{{ $user->email }}</p>
                            </div>
                            <div class="user-stats">
                                <span class="stats-count">{{ $user->news_count }}</span>
                                <span class="stats-label">статей</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
