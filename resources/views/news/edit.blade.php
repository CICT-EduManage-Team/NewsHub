@extends('layouts.app')

@section('title', 'Редактирование: ' . $news->title)

@section('styles')
    <script src="https://cdn.tiny.cloud/1/3gz1g1tj8g7k1qbgmqwmmd11kg6ulcau5gpld1zwij7js8j2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <div class="editor-page-container">
        <div class="editor-header">
            <h1 class="editor-title">
                <span class="icon-accent">✍</span> Редактирование новости
            </h1>
            <p class="editor-subtitle">Внесите необходимые правки в вашу публикацию</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="editor-card">
                    <form action="{{ route('news.update', $news->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="form-label-google">Заголовок</label>
                            <input type="text" class="form-control google-input-large"
                                   id="title" name="title"
                                   value="{{ old('title', $news->title) }}" required
                                   placeholder="Заголовок новости">
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label-google">Содержание</label>
                            <div class="tinymce-wrapper">
                                <textarea id="content" name="content">{{ old('content', $news->content) }}</textarea>
                            </div>
                        </div>

                        <div class="editor-actions">
                            <a href="{{ url()->previous() }}" class="btn-google-secondary">Отмена</a>
                            <button type="submit" class="btn-google-blue-large">
                                Обновить новость
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
        // Используем ту же функцию, которую мы вынесли в resources/js/editor.js
        // Или инициализируем здесь, если еще не вынес
        document.addEventListener('DOMContentLoaded', function() {
            if (window.initTinyMCE) {
                window.initTinyMCE(
                    "{{ route('tinymce.upload') }}",
                    "{{ csrf_token() }}"
                );
            } else {
                // Запасной вариант инициализации, если скрипты еще не в модулях
                tinymce.init({
                    selector: '#content',
                    plugins: 'advlist autolink lists link image charmap preview anchor',
                    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    height: 400,
                    branding: false,
                    language: 'ru',
                    content_style: "body { font-family:Roboto,Arial,sans-serif; font-size:16px; }"
                });
            }
        });
    </script>
@endsection
