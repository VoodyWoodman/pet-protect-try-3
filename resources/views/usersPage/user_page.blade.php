<!-- resourses/views/userPage/user_page.blade.php -->
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

        <div>
            <p>Имя пользователя: {{ $user->name }}</p>
            <form action="{{ route('admin.assignRole', $user->id) }}" method="POST">
                @csrf
                <button type="submit">Назначить роль админа</button>
            </form>
        </div>

    @endforeach
</ul>
@endif
