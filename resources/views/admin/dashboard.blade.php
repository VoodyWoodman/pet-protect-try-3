@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Административная панель</div>

                <div class="card-body">

                    <h2>Добро пожаловать, администратор!</h2>
                    <p>Здесь вы можете управлять вашим приложением.</p>
                    <nav>
                        <!-- Меню навигации для административной панели -->
                        <ul>
                            <li><a href="#">Главная</a></li>
                            <li><a href="{{ route('admin.user_page') }}" class="btn-primary">Пользователи</a></li>
                            <li><a href="{{ route('sites') }}" class="btn-primary">Сайты</a></li>
                            <li><a href="#">Настройки</a></li>
                        </ul>
                    </nav>

                    @if ($users->count() > 0)
                        <ul>
                            @foreach ($users as $user)
                                {{-- <li>
                                    <form action="{{ route('admin.assignRole', $user->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        {{-- <button type="submit" class="btn btn-primary">Назначить роль админа пользователю {{ $user->name }}</button> --}}
                                    </form>
                                </li>


                            @endforeach
                        </ul>
                    @else
                        <p>Нет доступных пользователей для назначения роли админа.</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
