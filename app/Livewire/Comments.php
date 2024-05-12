<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $article;
    public $body;

    public function mount($article)
    {
        $this->article = $article;
    }

    public function store()
    {
        $this->validate([
            'body' => 'required|max:150',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->article_id = $this->article->id;
        $comment->body = $this->body;
        $comment->save();

        $this->body = ''; // Очищаем поле ввода после добавления комментария

        // Повторно загружаем комментарии после добавления нового комментария
        $this->article->refresh();
    }

    public function deleteComment($commentId)
{
    $comment = Comment::findOrFail($commentId);

    $user = Auth::user();

    // Проверяем, имеет ли текущий пользователь право на удаление комментария
    if ($user->isAdmin() || $comment->user_id === $user->id || ($user->isModerator() && !$comment->user->isAdmin())) {
        // Удаляем комментарий
        $comment->delete();
        // Повторно загружаем комментарии после удаления комментария
        $this->comments = $this->article->comments()->with('user')->get();
    } else {
        // Если у пользователя нет прав на удаление комментария, выводим сообщение об ошибке
        session()->flash('error', 'У вас нет прав для удаления этого комментария.');
    }
}

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->article->comments()->with('user')->get(),
        ]);
    }
}
