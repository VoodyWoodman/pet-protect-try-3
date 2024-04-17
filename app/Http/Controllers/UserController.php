<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showUserProfile()
    {
        $user = Auth::user();
        return view('usersPage.user_profile', compact('user'));
    }
    public function index()
    {
        return view('dashboard.index');
    }

    public function create()
    {
        // Логика для отображения формы создания элемента
    }

    public function storeImage(Request $request)
    {
        // Логика для сохранения нового элемента в базе данных
    }

    public function edit($id)
    {
        // Логика для отображения формы редактирования элемента с идентификатором $id
    }

    public function update(Request $request, $id)
    {
        // Логика для обновления элемента в базе данных
    }

    public function destroy($id)
    {
        // Логика для удаления элемента с идентификатором $id из базы данных
    }

    public function uploadAvatar(Request $request)
    {
        // Проверяем, был ли загружен файл
        if ($request->hasFile('avatar')) {
            // Получаем текущего пользователя
            $user = Auth::user();

            // Получаем файл из запроса
            $avatarFile = $request->file('avatar');

            // Сохраняем загруженный файл
            $avatarName = $user->id.'_avatar_'.time().'.'.$avatarFile->getClientOriginalExtension();
            $avatarFile->storeImageAs('public/avatars', $avatarName);

            // Обновляем путь к аватару в базе данных
            $user->avatar_path = $avatarName;
            $user->save();

            // Возврат успешного сообщения или перенаправление пользователя
            return redirect()->back()->with('success', 'Аватар успешно загружен.');
        }

        // Если файл не был загружен, возвращаем сообщение об ошибке
        return redirect()->back()->with('error', 'Файл не был загружен.');
    }
}
