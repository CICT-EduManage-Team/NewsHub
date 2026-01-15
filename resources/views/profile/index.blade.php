@extends('layouts.app')
@section('title', 'Профиль пользователя ' . $user->name)
@section('content')
    <h1>Профиль пользователя {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <h2>Новости пользователя</h2>
    <div class="news-list">
        @forelse($news as $news)
            <div class="news-item">
                <h3><a href="{{ route('news.show', $news->id) }}">{{$news->title }}</a></h3>
                <small>Опубликовано: {{ $news->created_at->format('d.m.Y H:i') }}</small>
            </div>
        @empty
            <p>У пользователя нет новостей.</p>
        @endforelse
    </div>
@endsection
@section('styles')
    <style>
        .news-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
@endsection
