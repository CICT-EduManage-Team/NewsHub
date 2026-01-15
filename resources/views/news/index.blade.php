@extends('layouts.app')

@section('title', 'Новости сайта')

@section('content')
    <div class="news-feed-container">
        <div class="feed-header">
            <h1 class="feed-title">Актуальные новости</h1>
            <div class="feed-line"></div>
        </div>

        <div class="news-grid">
            @forelse($news as $newsItem)
                <article class="news-card">
                    <div class="news-card-content">
                        <div class="news-meta">
                        <span class="news-date">
                            <i class="bi bi-calendar3"></i> {{ $newsItem->created_at->format('d M Y') }}
                        </span>
                            <span class="news-author">
                            <i class="bi bi-person"></i> {{ $newsItem->user->name ?? 'Редакция' }}
                        </span>
                        </div>

                        <h2 class="news-title">
                            <a href="{{ route('news.show', $newsItem->id) }}">{{ $newsItem->title }}</a>
                        </h2>

                        <div class="news-excerpt">
                            {!! Str::limit(strip_tags($newsItem->content), 150) !!}
                        </div>

                        <div class="news-footer">
                            <a href="{{ route('news.show', $newsItem->id) }}" class="btn-read-more">
                                Подробнее <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-news">
                    <div class="empty-icon">📰</div>
                    <p>На данный момент свежих новостей нет. Загляните позже!</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
