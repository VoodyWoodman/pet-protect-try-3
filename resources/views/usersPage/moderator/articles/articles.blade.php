@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->body }}</p>
        <a href="{{ route('moderator.content') }}" class="btn btn-primary">Вернуться к списку статей</a>
        <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-secondary">Открыть статью на сайте</a>
    </div>
@endsection
