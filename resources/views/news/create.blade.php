@extends('layouts.app')

@section('title', 'Создание новости')

@section('styles')
    <script src="https://cdn.tiny.cloud/1/3gz1g1tj8g7k1qbgmqwmmd11kg6ulcau5gpld1zwij7js8j2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <div class="editor-page-container">
        <div class="editor-header">
            <h1 class="editor-title">
                <span class="icon-accent">✎</span> Создание новой статьи
            </h1>
            <p class="editor-subtitle">Поделитесь важными событиями с сообществом NewsHub</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="editor-card">
                    <form action="{{ route('news.store') }}" method="POST" id="newsForm">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="form-label-google">Заголовок статьи</label>
                            <input type="text" class="form-control google-input-large @error('title') is-invalid @enderror"
                                   id="title" name="title" required value="{{ old('title') }}"
                                   placeholder="Введите броский заголовок...">
                            @error('title') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label-google">Текст публикации</label>
                            <div class="tinymce-wrapper">
                                <textarea id="content" name="content">{{ old('content') }}</textarea>
                            </div>
                            @error('content') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>

                        <div class="editor-actions">
                            <a href="{{ route('news.index') }}" class="btn-google-secondary">Отмена</a>
                            <button type="submit" class="btn-google-blue-large">
                                Опубликовать статью
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Ждем, пока всё загрузится, и вызываем функцию, которую мы прокинули в window
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.initTinyMCE === 'function') {
                window.initTinyMCE(
                    "{{ route('tinymce.upload') }}",
                    "{{ csrf_token() }}"
                );
            }
        });
    </script>
@endsection
