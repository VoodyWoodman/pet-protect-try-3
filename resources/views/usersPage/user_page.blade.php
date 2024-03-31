<!-- resourses/views/userPage/index.blade.php -->
<h1>Список пользователей</h1>

@if ($users->isEmpty())
    <p>Нет пользлователей для отображения</p>
@else

<ul>
    @foreach ($users as $user)
        <li>
            №: {{ $user->id }}
            Имя: {{ $user->name }}
            Email: {{ $user->email }}
            Дата регистрации: {{ $user->created_at }}
        </li>
    @endforeach
</ul>
@endif
