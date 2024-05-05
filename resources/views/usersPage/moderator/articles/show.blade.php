@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h5>{{ $article->title }}</h5>
            <div>
                <p>{{ $article->created_at->format('d F Y') }}</p>
                @if ($article->user)
                    <p>Автор: {{ $article->user->name }}</p>
                @endif
            </div>
        </div>
        <div class="card-body">
            <p>{{ $article->body }}</p>
        </div>

        <!-- Комментарии -->
        @if ($article->comments)
            @foreach ($article->comments as $comment)
                <div class="comment">
                    <div class="user-info">
                        <img src="{{ $comment->user->avatar_url }}" alt="Avatar" class="avatar">
                        <span class="username">{{ $comment->user->name }}</span>
                    </div>
                    <p class="comment-body">{{ $comment->body }}</p>
                </div>
        @endforeach
        @endif

        <!-- Форма добавления комментария -->
        <div class="add-comment">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="body" placeholder="Оставьте комментарий" maxlength="150"></textarea>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>
@endsection
