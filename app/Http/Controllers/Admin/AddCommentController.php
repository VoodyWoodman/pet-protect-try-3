<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Site;

class AddCommentController extends Controller
{
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
