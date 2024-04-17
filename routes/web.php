<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AccountPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PostContentController;
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
// Route::get('/account', [AccountPageController::class, 'index']);
Route::get('/register2', [RegisterController::class, 'showRegistrationForm'])->name('register2');
Route::post('/register2', [RegisterController::class, 'register']);
Route::post('/upload/avatar', [UserController::class, 'uploadAvatar'])->name('upload.avatar');
// Route::get('/user/profile', [UserController::class, 'showProfile'])->name('user.profile');

Route::middleware(['auth'])->group(function () {
    // Отображение списка сайтов
    Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');

    // // Отображение формы добавления нового сайта
    Route::get('/create', [SiteController::class, 'create'])->name('sites.create');

    // Обработка отправленной формы и добавления нового сайта
    Route::post('/sites', [SiteController::class, 'store'])->name('sites.store');

    // Отображение страницы профиля
    Route::get('/userPage', [UserController::class, 'showUserProfile'])->name('user_profile');

    // Отображения страницы всех сайтов
    Route::get('/all_users_sites', [SiteController::class, 'allSites'])->name('sites.all');

    // Маршрут для отображения списка статей
    Route::get('/home', [PostContentController::class, 'index'])->name('home');

});

