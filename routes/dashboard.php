<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:superAdmin|admin'])->group(function () {
    Route::resource('/', HomeController::class)->only('index');
    Route::resource('/categories', CategoryController::class)->only('index', 'store', 'destroy');
    Route::get('/categories/toggle/{category}', [CategoryController::class, 'toggle'])->name('categories.toggle');
    Route::PUT('/categories', [CategoryController::class, 'update'])->name('categories.update');
});
