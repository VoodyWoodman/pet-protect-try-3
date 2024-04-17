@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Профиль') }} {{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <form action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="avatar">Выбрать фото:</label>
                            <input type="file" class="form-control-file @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Загрузить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Добавленная вторая секция -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Имя: {{ Auth::user()->name }}</div>
                <div class="card-header">Емейл: {{ Auth::user()->email }}</div>
                <div class="card-header">Изменить пароль:</div>
                <div class="card-header">Изменить почту:</div>
            </div>
        </div>
    </div>
</div>
@endsection
