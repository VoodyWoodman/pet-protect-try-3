<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return 'Admin route is working!';
})->name('admin.index'); // Добавляем имя маршруту админки

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard.index');
Route::get('/admin/assign-role/{id}', [AdminController::class, 'showAssignRoleForm'])->name('admin.showAssignRoleForm');
Route::post('/admin/assign-role/{id}', [AdminController::class, 'assignRole'])->name('admin.assignRole');
