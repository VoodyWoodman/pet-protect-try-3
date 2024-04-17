@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Все статьи</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->excerpt }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">Редактировать</button>
                                {{-- <a href="{{ route('moderator.articles.edit', ['article' => $article->id]) }}" class="btn btn-primary">Редактировать</a> --}}
                                <form action="{{ route('moderator.articles.destroy', ['article' => $article->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
