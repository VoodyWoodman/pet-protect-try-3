@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Список статей</div>

                <div class="card-body">
                    @if ($articles->isEmpty())
                    <p>В данный момент статей нет.</p>
                    @else
                    @foreach ($articles as $article)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->body }}</p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

