@extends('layouts.app')

@section('title', 'Новости сайта')

@section('content')
    <h1>Новости сайта</h1>

    @forelse($news as $newsItem)
        <div class="news-item">
            <h2>{{ $newsItem->title }}</h2>
            <p>{{ Str::limit($newsItem->content,100) }}</p>
            <small>Опубликовано: {{ $newsItem->created_at->format('d.m.Y H:i') }}</small>
            <a href="{{route('news.show',$newsItem->id)}}">подробнее</a>
        </div>
        <hr>
    @empty
        <p>Новостей нет</p>
    @endforelse

@endsection
