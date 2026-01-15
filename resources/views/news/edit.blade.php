@extends('layouts.app')
@section('title', 'Редактирование новости')
@section('styles')
    <script src="https://cdn.tiny.cloud/1/3gz1g1tj8g7k1qbgmqwmmd11kg6ulcau5gpld1zwij7js8j2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')
    <h1 class="mb-4">
        <i class="bi bi-pencil-square"></i> Редактирование новости
    </h1>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('news.update', $news->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Заголовок</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Содержание</label>
                            <textarea class="form-control" id="content" name="content" rows="5">{{ $news->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить новость</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'advlist autolink lists link image charmap preview anchor',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            height: 400,
        }
        );
    </script>
@endsection
