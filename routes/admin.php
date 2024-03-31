<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return 'Admin route is working!';
});

Route::get('/', [AdminController::class, 'index'])->name('dashboard');
