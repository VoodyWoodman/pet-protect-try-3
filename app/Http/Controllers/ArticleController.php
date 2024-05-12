<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('usersPage.moderator.articles.articles', compact('articles'));
    }
    public function show(Article $article)
    {
        return view('usersPage.moderator.articles.show', compact('article'));
    }
}
