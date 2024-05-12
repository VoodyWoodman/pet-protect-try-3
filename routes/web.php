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
use App\Http\Livewire\Comments;

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
Route::get('/usersPage', [UserController::class, 'user_page'])->name('user_page');
Route::post('/upload/avatar', [AvatarController::class, 'uploadAvatar'])->name('upload.avatar');
// Route::get('/profile', [UserController::class, 'showUserProfile'])->name('user.profile');

Route::middleware(['auth'])->group(function () {
    // Отображение списка сайтов
    Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');

    // // Отображение формы добавления нового сайта
    Route::get('/create', [SiteController::class, 'create'])->name('sites.create');

    // Обработка отправленной формы и добавления нового сайта
    Route::post('/sites', [SiteController::class, 'store'])->name('sites.store');

    // Отображение страницы профиля
    Route::get('/profile', [UserController::class, 'showUserProfile'])->name('user.profile');

    // Отображения страницы всех сайтов
    Route::get('/sites/all', [SiteController::class, 'allSites'])->name('sites.all');

    // Маршрут для отображения списка статей
    Route::get('/home', [PostContentController::class, 'index'])->name('home');

    //Маршрут отображающий полную статью
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

    //Маршрут для отображения каждой статьи
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

    // Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    // // Маршрут для удаления комментария
    // Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    // // Маршрут для ответа на комментарий
    // Route::post('/comments/reply/{comment}', [CommentController::class, 'reply'])->name('comments.reply');


    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments');


});
