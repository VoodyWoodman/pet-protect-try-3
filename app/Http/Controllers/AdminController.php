<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        // Получаем всех пользователей, кроме текущего администратора
        $users = User::where('id', '!=', Auth::id())->get();

        return view('admin.dashboard', ['users' => $users]);
    }

    public function sites()
    {
        $sites = Site::with('user')->get();
        return view('admin.sites', compact('sites'));
    }

    public function assignRole(Request $request, User $user)
    {
        $user->assignRole('admin');
        return redirect()->back()->with('success', 'Роль админа успешно назначена пользователю.');
    }

    public function user_page()
    {
        $users = User::all();
        return view('usersPage.user_page', ['users' => $users]);
    }

    public function addComment(Request $request, $id)
    {
        // Валидация запроса
        $validator = Validator::make($request->all(), [
        'comment' => 'required|string|max:65', // Максимальная длина 65 символов
    ]);

        // Проверяем валидацию
        if ($validator->fails()) {
        // Возвращаем ошибку в случае неудачи
        return redirect()->back()->withErrors($validator)->withInput();
        }

        $site = Site::findOrFail($id);
        $site->comment = $request->input('comment');
        $site->save();

        return redirect()->back()->with('succes', 'Комментарий успешно добавлен');
    }


}
