@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Пост</div>
                <div class="card-body">
                    <div class="post-content">
                        <h2>{{ $article->title }}</h2>
                        <p>{{ $article->body }}</p>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Комментарии</div>
                <div class="card-body">
                    @livewire('comments', ['article' => $article])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
