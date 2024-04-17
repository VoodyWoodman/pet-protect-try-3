<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index()
    {
        return view('usersPage.moderator.page');
    }

    public function create()
    {
        return view('usersPage.moderator.content_create');
    }



}
