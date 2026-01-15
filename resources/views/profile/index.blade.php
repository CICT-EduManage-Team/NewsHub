@extends('layouts.app')

@section('title', 'Профиль пользователя ' . $user->name)

@section('content')
    <div class="profile-container">
        <div class="profile-header-card">
            <div class="profile-cover"></div>
            <div class="profile-main-info">
                <div class="profile-avatar-large">
                    {{ mb_substr($user->name, 0, 1) }}
                </div>
                <div class="profile-text">
                    <h1 class="profile-name">{{ $user->name }}</h1>
                    <p class="profile-email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                        {{ $user->email }}
                    </p>
                </div>
            </div>
        </div>

        <div class="profile-content">
            <h2 class="content-title">Публикации автора <span>({{ $news->count() }})</span></h2>

            <div class="news-grid-profile">
                @forelse($news as $item)
                    <div class="news-card-simple">
                        <div class="news-card-body">
                            <span class="news-date">{{ $item->created_at->format('d M Y') }}</span>
                            <h3 class="news-card-title">
                                <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                            </h3>
                            <div class="news-card-footer">
                                <a href="{{ route('news.show', $item->id) }}" class="read-more-link">Читать полностью →</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <p>У пользователя пока нет опубликованных новостей.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
