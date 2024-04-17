@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Панель модератора</div>

                <div class="card-body">

                    <h1 class="mt-2 mb-3">Создать пост</h1>
                        <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                         @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Введите заголовок" required>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="excerpt" placeholder="Введите анонс поста" required></textarea>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="body" placeholder="Введите текст поста" rows="7" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control-file" name="image">
                            <small class="form-text text-muted">Загрузите изображение (если есть)</small>
                        </div>

                        <!-- Отображение ошибок валидации -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
