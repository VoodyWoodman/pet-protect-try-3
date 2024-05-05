<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use App\Http\Controllers\AccountPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PostContentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Email\EmailVerificationController;
use App\Http\Controllers\Auth\AvatarController;
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
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


// Маршрут для уведомления о подтверждении электронной почты
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

// Маршрут для обработки запросов подтверждения
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Маршрут для повторной отправки ссылки на подтверждение
Route::post('/email/verification-notification/{userId?}', [EmailVerificationController::class, 'sendVerificationNotification'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// Маршруты аутентификации с подтверждением адреса электронной почты...
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/register', function () {
//     return view('auth.register');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/account', [AccountPageController::class, 'index']);
Route::get('/register2', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register2', [RegisterController::class, 'register']);
Route::post('/upload-avatar', [AvatarController::class, 'uploadAvatar'])->name('avatar.upload');
// Route::get('/user/profile', [UserController::class, 'showProfile'])->name('user.profile');

Route::middleware(['auth'])->group(function () {
    // Отображение списка сайтов
    Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');

    // // Отображение формы добавления нового сайта
    Route::get('/create', [SiteController::class, 'create'])->name('sites.create');

    // Обработка отправленной формы и добавления нового сайта
    Route::post('/sites', [SiteController::class, 'store'])->name('sites.store');

    // Отображение страницы профиля
    Route::get('/profile', [UserController::class, 'showUserProfile'])->name('user_profile');

    // Отображения страницы всех сайтов
    Route::get('/sites/all', [SiteController::class, 'allSites'])->name('sites.all');

    // Маршрут для отображения списка статей
    Route::get('/home', [PostContentController::class, 'index'])->name('home');

    //Маршрут отображающий полную статью
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

    //Маршрут для отображения каждой статьи
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


});

