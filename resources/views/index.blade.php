@extends('layouts.app')

@section('title', 'Главная страница')
@section('content')
    <div class="container">
        <h1>Добро пожаловать на главную страницу!</h1>
    </div>
    <div class="users">
        <h2>Список пользователей</h2>
        <ul>
            @foreach($users as $user)
                <li><a href="{{route('profile',$user->id)}}">{{ $user->name }} ({{ $user->email }})  {{$user->news_count}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
