<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Rules\ValidUrlCharacters;
use Illuminate\Http\Request;
use App\Http\Requests\SiteRequest;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    // Метод, который отображает список сайтов текущего пользователя
    public function index()
    {
        $sites = auth()->user()->sites;

        return view('sites.sites', compact('sites'));
    }

    // Метод для отображения формы добавления нового сайта
    public function create()
    {
        return view('sites.create');
    }

    // Метод для обработки отправленной формы и добавления нового сайта
    public function store(SiteRequest $request)
    {
        // Получаем URL из входных данных
        $url = $request->input('url');

        // Проверка на предмет существования сайта с таким URL в базе данных
        $existingSite = Site::where('url', $url)->first();

        if ($existingSite) {
        // Если сайт существует - выдаем сообщение об ошибке
            return redirect()->back()->withErrors(['url' => 'Такой сайт уже имеется в нашей базе'])->withInput();
        }

        // Валидация URL с помощью нового правила
         $validator = Validator::make(['url' => $url], [
        'url' => ['required', 'url', new ValidUrlCharacters()],
         ]);

        if ($validator->fails()) {
            // Если валидация не пройдена, возвращаем ошибки
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Добавляем новый сайт в базу данных
        auth()->user()->sites()->create([
            'url' => $url,
        ]);


        // Перенаправление пользователя с сообщением об успехе
        return redirect()->route('sites.index')->with('success', 'Сайт успешно добавлен');
    }
    public function update(Request $request, $id)
    {
        // Находим сайт по идентификатору
        $site = Site::findOrFail($id);

        // Проверяем, является ли текущий пользователь владельцем сайта
        if ($site->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'У вас нет прав для редактирования этого сайта.');
        }

        // Валидация данных
        $request->validate([
            'url' => 'required|url',
        ]);

        // Обновляем URL сайта
        $site->update([
            'url' => $request->url,
        ]);

        return redirect()->back()->with('success', 'URL сайта успешно обновлен.');
    }
}

