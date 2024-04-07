@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Список сайтов</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID сайта</th>
                                <th scope="col">Пользователь</th>
                                <th scope="col">URL сайта</th>
                                <th scope="col">Комментарий</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sites as $site)
                            <tr>
                                <td>{{ $site->id }}</td>
                                <td>{{ $site->user->email }}</td>
                                <td>
                                    <span class="site-url">{{ $site->url }}</span>
                                    <input type="text" class="form-control site-url-input" value="{{ $site->url }}" style="display: none;">
                                </td>
                                <td>
                                    <span class="site-comment">{{ wordwrap($site->comment, 15, "\n", true) }}</span>
                                    <textarea class="form-control site-comment-input" style="display: none;">{{ $site->comment }}</textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary edit-site">Редактировать</button>
                                    <button type="button" class="btn btn-success save-site" style="display: none;">Сохранить</button>
                                    <button type="button" class="btn btn-secondary cancel-edit" style="display: none;">Отменить</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
    // Редактирование сайта
    $('.edit-site').click(function() {
        var row = $(this).closest('tr');
        row.find('.site-url').hide();
        row.find('.site-url-input').val(row.find('.site-url').text()).show();
        row.find('.site-comment').hide();
        row.find('.site-comment-input').val(row.find('.site-comment').text()).show();
        row.find('.edit-site').hide();
        row.find('.save-site').show();
        row.find('.cancel-edit').show();
    });

    // Отмена редактирования сайта
    $('.cancel-edit').click(function() {
        var row = $(this).closest('tr');
        row.find('.site-url').show();
        row.find('.site-url-input').hide();
        row.find('.site-comment').show();
        row.find('.site-comment-input').hide();
        row.find('.edit-site').show();
        row.find('.save-site').hide();
        row.find('.cancel-edit').hide();
    });

    // Сохранение изменений сайта
    $('.save-site').click(function() {
        var row = $(this).closest('tr');
        var newUrl = row.find('.site-url-input').val();
        var newComment = row.find('.site-comment-input').val();

        // Обновляем данные в таблице
        row.find('.site-url').text(newUrl);
        row.find('.site-comment').text(newComment);

        // Показываем скрытые элементы
        row.find('.site-url').show();
        row.find('.site-comment').show();
        row.find('.edit-site').show();

        // Скрываем элементы для редактирования
        row.find('.site-url-input').hide();
        row.find('.site-comment-input').hide();
        row.find('.save-site').hide();
        row.find('.cancel-edit').hide();
    });
});
</script>
@endsection
