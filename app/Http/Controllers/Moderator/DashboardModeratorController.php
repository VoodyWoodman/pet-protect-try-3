<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardModeratorController extends Controller
{
    //Вывод списка модераторов

    public function moderators()
    {
        $moderators = User::where('role', 'moderator')
                            ->select('id', 'name', 'email')
                            ->get();

        return view('usersPage.moderator.moderator_dashboard', compact('moderators'));
    }
}
