@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Модераторы</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moderators as $moderator)
                    <tr>
                        <td>{{ $moderator->id }}</td>
                        <td>{{ $moderator->name }}</td>
                        <td>{{ $moderator->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
