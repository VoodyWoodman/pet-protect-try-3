<div>
    @foreach($comments as $comment)
        <div style="display: flex; align-items: center;">
            <!-- Аватар пользователя -->
            <div class="avatar-style" style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; margin-right: 10px;">
                <img src="{{ asset('storage/' . $comment->user->avatar) }}" alt="Avatar" style="width: 100%; height: auto;">
            </div>
            <!-- Информация о комментарии -->
            <div>
                <div>Дата: {{ $comment->created_at->format('d.m.Y H:i') }}</div>
                <div>Автор: {{ $comment->user->name }}</div>

                <!-- Проверка роли пользователя и владельца комментария для отображения кнопки удаления -->
                @if (auth()->user()->isAdmin() || (auth()->user()->isModerator() && !$comment->user->isAdmin()) || $comment->user_id === auth()->id())
                    <button wire:click="deleteComment({{ $comment->id }})" class="btn btn-sm btn-danger">Удалить</button>
                @endif
            </div>
        </div>
        <!-- Комментарий -->
        <div>{{ $comment->body }}</div>
    @endforeach

    <!-- Форма для добавления комментариев -->
    <form wire:submit.prevent="store">
        <input type="text" wire:model="body" placeholder="Оставьте комментарий" maxlength="150">
        @error('body')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <button type="submit">Отправить</button>
    </form>
