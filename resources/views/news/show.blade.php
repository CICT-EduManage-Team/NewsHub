@extends('layouts.app')

@section('title', $news->title)
@section('content')
    <h1>{{ $news->title }}</h1>
    <p>{!! $news->content !!}</p>
    <small>Опубликовано: {{ $news->created_at->format('d.m.Y H:i') }}</small>
    <br>
    @if(auth()->id() == $news->user_id)
        <a href="{{ route('news.edit',$news->id) }}" class="btn btn-warning">edit</a>
        <a href="{{ route('news.destroy',$news->id) }}" class="btn btn-danger">delete</a>
    @endif
    <br>
    <h2>Комментарии</h2>
    <div class="comments">
        @forelse($comments as $comment)
            <div class="comment">
                <h5>{{ $comment->content }}</h5>
                <small>Автор: <a href="{{ route('profile',$comment->user->id) }}">{{ $comment->user->name }}</a>, {{ $comment->created_at->format('d.m.Y H:i') }}</small>
            </div>
        @empty
            <p>Комментариев нет</p>
        @endforelse
    </div>
    @auth()
        <h3>Оставить комментарий</h3>
        <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <input type="hidden" name="news_id" value="{{ $news->id }}">
            <div class="form-group">
                <label for="content">Комментарий</label>
                <textarea name="content" id="content" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Отправить</button>
        </form>
    @endauth
@endsection
@section('styles')
    <style>
        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
@endsection
