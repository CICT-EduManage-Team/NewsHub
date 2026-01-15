@extends('layouts.app')

@section('content')
    <div class="auth-page-container">
        <div class="auth-card">
            <div class="auth-header-block">
                <h2 class="brand-name">NewsHub</h2>
                <h1 class="form-title">Создать аккаунт</h1>
                <p class="form-subtitle">Введите ваши данные</p>
            </div>

            <form method="POST" action="{{ route('registered') }}" class="auth-form">
                @csrf

                <div class="input-group-custom">
                    <input id="name" type="text" class="google-input @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required placeholder="Ваше имя" autofocus>
                    @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="input-group-custom">
                    <input id="email" type="email" class="google-input @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required placeholder="Email адрес">
                    @error('email') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="password-row">
                    <div class="password-col">
                        <input id="password" type="password" class="google-input @error('password') is-invalid @enderror"
                               name="password" required placeholder="Пароль">
                    </div>
                    <div class="password-col">
                        <input id="password-confirm" type="password" class="google-input"
                               name="password_confirmation" required placeholder="Повтор">
                    </div>
                </div>
                @error('password') <span class="error-msg mb-3">{{ $message }}</span> @enderror

                <p class="hint-text">Используйте 6 или более символов.</p>

                <div class="form-actions">
                    <a href="{{ route('login') }}" class="link-secondary-google">Войти вместо этого</a>
                    <button type="submit" class="btn-google-blue">
                        Далее
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
