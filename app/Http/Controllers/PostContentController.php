<?php

namespace App\Http\Controllers;

use App\Models\Article; // Используем модель Article
use Illuminate\Http\Request;

class PostContentController extends Controller
{
    public function index()
    {
        // Получаем последние статьи с пагинацией
        $articles = Article::all();

        // Передаем статьи в представление home
        return view('home', compact('articles'));
    }

    public function create()
    {
        return view('usersPage.moderator.content_create');
    }

    public function allContent()
    {
        $articles = Article::all();
        return view('usersPage.moderator.all_moderator_content', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('usersPage.moderator.articles.articles', compact('article'));
    }

    public function publicShow(Article $article)
    {
        // Здесь можете определить логику для определения номера статьи и перенаправления
        return redirect()->route('site.show', ['site' => $article->id]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('moderator.content')
            ->with('success', 'Статья успешно удалена.');
    }

    public function store(Request $request)
    {
        // Проверка данных формы
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'body' => 'required|string',
        ]);

        // Создание новой статьи
        $article = new Article();
        $article->title = $request->title;
        $article->excerpt = $request->excerpt;
        $article->body = $request->body;

        $article->save();

        // Перенаправление после сохранения
        return redirect()->route('moderator.content')->with('success', 'Статья успешно создана.');


    }
}
