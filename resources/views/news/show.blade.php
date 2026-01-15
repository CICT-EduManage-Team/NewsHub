@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <div class="article-container">
        <header class="article-header">
            <h1 class="article-display-title">{{ $news->title }}</h1>

            <div class="article-author-card">
                <div class="comment-avatar">
                    {{ mb_substr($news->user->name, 0, 1) }}
                </div>
                <div class="author-info">
                    <a href="{{ route('profile', $news->user->id) }}" class="comment-author">
                        {{ $news->user->name }}
                    </a>
                    <span class="comment-date">
                <i class="bi bi-clock"></i> {{ $news->created_at->format('d M Y, H:i') }}
            </span>
                </div>
            </div>

            @if(auth()->id() == $news->user_id)
                <div class="article-admin-panel">
                    <a href="{{ route('news.edit', $news->id) }}" class="btn-edit-action">
                        <i class="bi bi-pencil"></i> Редактировать
                    </a>
                    <form action="{{ route('news.destroy', $news) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete-action" onclick="return confirm('Удалить эту новость?')">
                            <i class="bi bi-trash"></i> Удалить
                        </button>
                    </form>
                </div>
            @endif
        </header>

        <div class="article-content">
            {!! $news->content !!}
        </div>

        <hr class="section-divider">

        <section class="comments-section">
            <h2 class="comments-title">
                <i class="bi bi-chat-left-text"></i> Обсуждение
                <span class="comments-count">({{ $comments->count() }})</span>
            </h2>

            <div class="comments-list">
                @forelse($comments as $comment)
                    <div class="comment-card">
                        <div class="comment-avatar">
                            {{ mb_substr($comment->user->name, 0, 1) }}
                        </div>
                        <div class="comment-body">
                            <div class="comment-header">
                                <a href="{{ route('profile', $comment->user->id) }}" class="comment-author">
                                    {{ $comment->user->name }}
                                </a>
                                <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="comment-text">{{ $comment->content }}</p>
                        </div>
                    </div>
                @empty
                    <div class="empty-comments-state">
                        <p>Пока никто не оставил комментарий. Будьте первым!</p>
                    </div>
                @endforelse
            </div>

            @auth
                <div class="comment-form-wrapper">
                    <h3 class="form-subtitle">Ваш комментарий</h3>
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="news_id" value="{{ $news->id }}">
                        <div class="form-group-google">
                        <textarea name="content" id="content" class="google-textarea"
                                  placeholder="Напишите, что вы думаете..." required rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn-google-blue">Отправить мнение</button>
                    </form>
                </div>
            @else
                <section class="comments-section">
                    @auth
                        {{-- Этот блок видят ТОЛЬКО авторизованные пользователи --}}
                        <div class="comment-form-wrapper">
                            <h3 class="form-subtitle">Ваш комментарий</h3>
                            <form action="{{ route('comments.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="news_id" value="{{ $news->id }}">
                                <div class="form-group-google">
                    <textarea name="content" id="content" class="google-textarea"
                              placeholder="Напишите, что вы думаете..." required rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn-google-blue">Отправить мнение</button>
                            </form>
                        </div>
                    @endauth

                    @guest
                        {{-- Этот блок видят ТОЛЬКО те, кто НЕ вошел в систему --}}
                        <div class="login-to-comment">
                            <div class="alert-login-box">
                                <i class="bi bi-info-circle"></i>
                                <span><a href="{{ route('login') }}">Войдите</a>, чтобы участвовать в обсуждении.</span>
                            </div>
                        </div>
                    @endguest
                </section>
            @endauth
        </section>
    </div>
@endsection
