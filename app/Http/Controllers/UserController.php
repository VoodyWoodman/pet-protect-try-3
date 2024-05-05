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
}
