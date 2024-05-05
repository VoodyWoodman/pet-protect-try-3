@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Панель модератора</div>

                <div class="card-body">

                    <h2>Добро пожаловать, модератор!</h2>
                    <p>Здесь вы можете управлять вашим приложением.</p>
                    <nav>
                        <!-- Меню навигации для административной панели -->
                        <ul>
                            <li><a href="#">Главная</a></li>
                            <a href="{{ route('moderator.content') }}">Контент</a>
                            <li><a href="{{ route('create') }}" class="btn-primary">Создать контент</a></li>
                            <li><a href="{{ route('moderator.dashboard') }}" class="btn-primary">Модераторы</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
