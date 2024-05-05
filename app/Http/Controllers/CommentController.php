<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:150',
            'article_id' => 'required|exists:articles,id',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->article_id = $request->article_id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()->back()->with('success', 'Комментарий добавлен.');
    }
}
