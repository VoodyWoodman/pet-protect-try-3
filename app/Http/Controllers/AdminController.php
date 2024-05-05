<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Site;


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




}
