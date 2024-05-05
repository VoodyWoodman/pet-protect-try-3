@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Список пользователей</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID пользователя</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Email</th>
                                <th scope="col">Дата регистрации</th>
                                <th scope="col">Роль</th>
                                <th scope="col">Email подтвержден</th>
                                <th scope="col">Действия</th> <!-- Новая колонка для кнопки -->
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="7">Нет пользователей для отображения</td> <!-- Изменено значение colspan -->
                                </tr>
                            @else
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            @if ($user->email_verified_at)
                                                <span style="color: green;">&#10003;</span> <!-- Галочка -->
                                            @else
                                                <span style="color: red;">&#10007;</span> <!-- Крестик -->
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$user->email_verified_at)
                                            <form action="{{ route('Verification.send', ['userId' => $user->id]) }}" method="post">
                                                @csrf
                                                <button class="btn btn-primary">Отправить подтверждение email</button>
                                            @else
                                                <button class="btn btn-primary" disabled>Отправить подтверждение email</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
