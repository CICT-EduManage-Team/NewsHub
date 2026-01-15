@extends('layouts.app')

@section('title', $news->title)
@section('content')
    <h1>{{ $news->title }}</h1>
    <p>{!! $news->content !!}</p>
    <small>Опубликовано: {{ $news->created_at->format('d.m.Y H:i') }}</small>
@endsection
