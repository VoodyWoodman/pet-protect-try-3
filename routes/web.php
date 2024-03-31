<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register2');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/account', [AccountPageController::class, 'index']);
Route::get('/register2', [RegisterController::class, 'showRegistrationForm'])->name('register2');
Route::post('/register2', [RegisterController::class, 'register']);
Route::get('/usersPage', [UserController::class, 'user_page'])->name('user_page');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
