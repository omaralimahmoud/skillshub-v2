<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\SkillController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:superAdmin|admin'])->group(function () {
    Route::resource('/', HomeController::class)->only('index');
    Route::resource('/categories', CategoryController::class)->only('index', 'store', 'destroy');
    Route::get('/categories/toggle/{category}', [CategoryController::class, 'toggle'])->name('categories.toggle');
    Route::PUT('/categories', [CategoryController::class, 'update'])->name('categories.update');

    // skills
    Route::resource('/skills', SkillController::class)->only('index', 'store', 'destroy');
    Route::get('/skills/toggle/{skill}', [SkillController::class, 'toggle'])->name('skills.toggle');
    Route::Put('/skills', [SkillController::class, 'update'])->name('skills.update');

});
