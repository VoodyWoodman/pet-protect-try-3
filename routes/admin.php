<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return 'Admin route is working!';
})->name('admin.index'); // Добавляем имя маршруту админки

Route::middleware(['auth','admin'])->group(function () {

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/assign-role/{id}', [AdminController::class, 'showAssignRoleForm'])->name('admin.showAssignRoleForm');
Route::post('/admin/assign-role/{id}', [AdminController::class, 'assignRole'])->name('admin.assignRole');

// Маршрут для страницы "Список пользователей"
Route::get('/usersPage', [AdminController::class, 'user_page'])->name('admin.user_page');

// Маршрут для страницы "Сайты"
Route::get('/admin/dashboard/sites', [AdminController::class,'sites'])->name('sites');

// Добавляем маршрут для обновления сайта
Route::put('/sites/{site}', [SiteController::class, 'update'])->name('sites.update');

// Маршрут для размещения комментария
Route::post('/sites/{id}/add-comment', [AdminController::class, 'addComment'])->name('sites.addComment');
});
