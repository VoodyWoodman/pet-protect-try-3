<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\SiteController;

Route::middleware(['auth','admin'])->group(function () {

    // Маршрут для модераторов



});
