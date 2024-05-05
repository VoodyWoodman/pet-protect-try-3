<?php

use App\Http\Controllers\Moderator\DashboardModeratorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\PostContentController;

Route::middleware(['auth', 'moderator'])->group(function () {

    // Маршруты для модераторов
    Route::get('/dashboard', [ModeratorController::class, 'index'])->name('page.index');
    Route::get('/content_create', [ModeratorController::class, 'create'])->name('moderator.content.create');
    Route::post('/store', [PostContentController::class, 'store'])->name('store');
    Route::get('/create', [PostContentController::class, 'create'])->name('create');
    Route::get('/content', [PostContentController::class, 'allContent'])->name('moderator.content');
    Route::get('/moderator/articles/{article}', [PostContentController::class, 'show'])->name('moderator.articles.show');
    Route::delete('/moderator/articles/{article}', [PostContentController::class, 'destroy'])->name('moderator.articles.destroy');

    // Маршрут для страницы "Список модераторов"
    Route::get('/moderators', [DashboardModeratorController::class, 'moderators'])->name('moderator.dashboard');


});
