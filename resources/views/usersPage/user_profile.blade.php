@extends('layouts.app')

@section('content')
<link href="{{ asset('css/avatar.style.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <span>{{ __('Профиль') }} {{ $user->name }}</span>
                    <div class="avatar-style" style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" style="width: 100%; height: auto;">
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="avatar">Выбрать фото:</label>
                            <input type="file" class="form-control-file @error('avatar') is-invalid @enderror" id="avatar" name="avatar" accept="image/jpeg, image/png" onchange="checkFileSize(this)">
                            <script>
                                function checkFileSize(input) {
                                    if (input.files.length > 0) {
                                        var fileSize = input.files[0].size; // размер файла в байтах
                                        var maxSize = 1024 * 1024; // 1 мегабайт (в байтах)
                                        if (fileSize > maxSize) {
                                            alert('Файл слишком большой. Максимальный размер 1 МБ.');
                                            input.value = ''; // очищаем значение поля ввода
                                        }
                                    }
                                }
                            </script>
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
                <div class="card-header"><a href="{{ route('password.request') }}">Изменить пароль</a></div>
                <div class="card-header">Изменить почту:</div>
            </div>
        </div>
    </div>
</div>

@endsection


