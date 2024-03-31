<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <!-- Добавьте ссылки на ваши CSS-файлы и скрипты -->
</head>
<body>
    <header>
        <h1>Административная панель</h1>
    </header>

    <nav>
        <!-- Меню навигации для административной панели -->
        <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="{{ route('user_page')}}" class="btn-primary">Пользователи</a></li>
            <li><a href="#">Настройки</a></li>
            <!-- Другие пункты меню -->
        </ul>

    </nav>

    <main>
        <!-- Основное содержимое страницы административной панели -->
        <div>
            <!-- Здесь могут быть блоки с информацией, таблицы с данными и т.д. -->
            <h2>Добро пожаловать, администратор!</h2>
            <p>Здесь вы можете управлять вашим приложением.</p>
            @foreach($users as $user)
            <form action="{{ route('admin.assignRole', $user->id) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-primary">Назначить роль админа пользователю {{ $user->name }}</button>
            </form>
            @endforeach
        </div>
    </main>

    <footer>
        <!-- Подвал административной панели -->
        <p>&copy; 2024 Ваше приложение</p>
    </footer>
</body>
</html>
