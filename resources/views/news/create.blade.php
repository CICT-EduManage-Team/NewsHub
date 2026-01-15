@extends('layouts.app')

@section('title', 'Создание новости')

@section('styles')
    <script src="https://cdn.tiny.cloud/1/3gz1g1tj8g7k1qbgmqwmmd11kg6ulcau5gpld1zwij7js8j2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <h1 class="mb-4">
        <i class="bi bi-plus-circle"></i> Create New News
    </h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('news.store') }}" method="POST">
    @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create News</button>
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
            language: 'ru',

            images_upload_url: "{{ route('tinymce.upload') }}",
            images_upload_credentials: true, // 🔥 обязательно

            paste_data_images: false,

            images_upload_handler: function (blobInfo, progress) {
                return new Promise(function (resolve, reject) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', "{{ route('tinymce.upload') }}");

                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                    xhr.upload.onprogress = function (e) {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = function () {
                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }

                        let json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location !== 'string') {
                            reject('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        resolve(json.location);
                    };

                    xhr.onerror = function () {
                        reject('Image upload failed');
                    };

                    let formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                });
            }
        });


        // document.querySelector('form').addEventListener('submit', () => tinymce.triggerSave());
    </script>
@endsection
