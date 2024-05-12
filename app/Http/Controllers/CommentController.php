<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
//     public function store(Request $request)
//     {
//         $request->validate([
//             'body' => 'required|max:150',
//             'article_id' => 'required|exists:articles,id',
//         ]);

//         $comment = new Comment();
//         $comment->user_id = auth()->check() ? auth()->id() : null;
//         $comment->article_id = $request->article_id;
//         $comment->body = $request->body;
//         $comment->save();

//         return redirect()->back()->with('success', 'Комментарий добавлен.');
//     }

//     public function destroy(Comment $comment)
// {
//     // Получаем текущего аутентифицированного пользователя
//     $user = Auth::user();

//     // Проверяем, имеет ли текущий пользователь право удалять комментарий
//     if ($user->isAdmin() || $comment->user_id === $user->id || ($user->isModerator() && !$comment->user->isAdmin())) {
//         // Удаляем комментарий
//         $comment->delete();
//         return redirect()->back()->with('success', 'Комментарий успешно удален.');
//     } else {
//         // Если у пользователя нет прав на удаление комментария, перенаправляем его обратно
//         return redirect()->back()->with('error', 'У вас нет прав для удаления этого комментария.');
//     }
// }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function showPopelarWords()
    {
        $comments = Comment::pluck('body')->toArray();
        $words = array_count_values(str_word_count(implode('', $comments), 1));

        // Сортировка по частоте встречаемости
        arsort($words);

        // Получаем 10 популярных слов
        $popularWords = array_slice(array_keys($words), 0, 10);

        return view('admin.popular_words', compact('popularWords'));
    }

    public function showRelatedWords($word)
    {
        $comments = Comment::pluck('body')->toArray();
        $words = array_count_values(str_word_count(implode(' ', $comments), 1));

        // Сортируем слова по частоте встречаемости
        arsort($words);

        // Получаем связанные слова для выбранного слова
        $relatedWords = [];
        foreach ($comments as $comment) {
            if (str_contains($comment, $word)) {
                $commentWords = str_word_count($comment, 1);
                foreach ($commentWords as $commentWord) {
                    if ($commentWord != $word && !in_array($commentWord, $relatedWords)) {
                        $relatedWords[] = $commentWord;
                    }
                }
            }
        }

        // Отфильтровываем слова, которые уже были выбраны
        $relatedWords = array_diff($relatedWords, [$word]);

        // Получаем только следующие 10 связанных слов
        $relatedWords = array_slice($relatedWords, 0, 10);

        return view('admin.related_words', compact('relatedWords'));
    }
}
