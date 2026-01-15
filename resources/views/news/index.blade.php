@extends('layouts.app')

@section('title', 'Новости сайта')

@section('content')
    <h1>Новости сайта</h1>

    @forelse($news as $newsItem)
        <div class="news-item">
            <h2>{{ $newsItem->title }}</h2>
            <small>Опубликовано: {{ $newsItem->created_at->format('d.m.Y H:i') }}</small>
            <a href="{{route('news.show',$newsItem->id)}}" class="btn btn-info">подробнее</a>
        </div>
    @empty
        <p>Новостей нет</p>
    @endforelse

@endsection

@section('styles')
    <style>
        .news-item {
            margin-bottom: 20px;
            border: #4a5568 1px solid;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
@endsection
