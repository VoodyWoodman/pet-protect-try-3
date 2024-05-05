<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AvatarController extends Controller
{

    public function storeImage(Request $request)
    {
        // Логика для сохранения нового элемента в базе данных
    }
    public function uploadAvatar(Request $request)
    {
        // Проверяем, был ли загружен файл
        if ($request->hasFile('avatar')) {
            // Получаем текущего пользователя
            $user = auth()->user();

            // Получаем файл из запроса
            $avatarFile = $request->file('avatar');

            // Сохраняем загруженный файл
            $avatarPath = $avatarFile->store('avatars', 'public');

            // Обновляем путь к аватару в базе данных
            $user->avatar = $avatarPath;
            $user->save();

            // Возврат успешного сообщения или перенаправление пользователя
            return redirect()->back()->with('success', 'Аватар успешно загружен.');
        }

        // Если файл не был загружен, возвращаем сообщение об ошибке
        return redirect()->back()->with('error', 'Файл не был загружен.');
    }
}
