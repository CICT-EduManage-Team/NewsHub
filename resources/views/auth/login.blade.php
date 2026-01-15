@extends('layouts.app')

@section('content')
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="text-center mb-3">
                <h2 class="auth-brand">NewsHub</h2>
                <h1 class="auth-title">Вход</h1>
                <p class="auth-subtitle">Используйте аккаунт NewsHub</p>
            </div>

            <form method="POST" action="{{ route('logged') }}">
                @csrf

                <div class="mb-4">
                    <input id="email" type="email" class="form-control google-input @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required placeholder="Email" autofocus>
                    @error('email')
                    <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <input id="password" type="password" class="form-control google-input @error('password') is-invalid @enderror"
                           name="password" required placeholder="Введите пароль">
                    @error('password')
                    <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-5">
                    <a href="{{ route('register') }}" class="google-link">Создать аккаунт</a>
                    <button type="submit" class="btn btn-google-primary">
                        Далее
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
