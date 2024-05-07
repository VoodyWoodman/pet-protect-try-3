<?php

use App\Http\Controllers\Email\EmailVerificationController;
use App\Http\Controllers\PostContent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\PostContentController;
use App\Http\Controllers\CommentController;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return 'Admin route is working!';
})->name('admin.index'); // Добавляем имя маршруту админки

Route::middleware(['auth','admin',])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/assign-role/{id}', [AdminController::class, 'showAssignRoleForm'])->name('admin.showAssignRoleForm');
    Route::post('/admin/assign-role/{id}', [AdminController::class, 'assignRole'])->name('admin.assignRole');

    // Маршрут для страницы "Список пользователей"
    Route::get('/users', [AdminController::class, 'user_page'])->name('admin.user_page');

    // Маршрут для страницы "Сайты"
    Route::get('/sites', [AdminController::class,'sites'])->name('sites');

    // Добавляем маршрут для обновления сайта
    Route::put('/sites/{site}', [SiteController::class, 'update'])->name('sites.update');

    // Маршрут для размещения комментария
    Route::post('/sites/{id}/add-comment', [CommentController::class, 'addComment'])->name('sites.addComment');

    Route::post('/email/verification-notification/{userId}', [EmailVerificationController::class, 'sendVerificationNotification'])->name('Verification.send');

    // Маршрут для отправки письма с админки
    Route::post('/send-verification-email/{userId}', [EmailVerificationController::class, '']);


        // //Маршрут для модераторов
        // Route::get('/page', [ModeratorController::class, 'index'])->name('admin.moderator');

        // // Маршрут для отображения формы создания статьи
        // Route::get('/content_create', [ModeratorController::class, 'create'])->name('content.create');

        // // маршрут для обработки отправки формы и сохранения статьи в базе данных
        // Route::post('/store', [PostContentController::class, 'store'])->name('store');

        // // Маршрут к кнопке "создать контент"
        // Route::get('/create', [PostContentController::class, 'create'])->name('create');

        // Route::get('/all_moderator_content', [PostContentController::class, 'allContent'])->name('moderator.content');
        // Route::get('/moderator/articles/{article}', [PostContentController::class, 'show'])->name('moderator.articles.show');
        // Route::get('/articles/{article}', [PostContentController::class, 'publicShow'])->name('articles.show');

        // Route::delete('/moderator/articles/{article}', [PostContentController::class, 'destroy'])->name('moderator.articles.destroy');

        // // include('moderator.php');

});
