<?php

use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\Exam\ExamController;
use App\Http\Controllers\Website\Exam\ExamQuestionController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('skills/{id}', [SkillController::class, 'show'])->name('skills.show');

Route::resource('exams', ExamController::class)->only(['show']);
// custom route
Route::prefix('exams/{exam}/questions')
    ->name('exams.questions.')
    ->controller(ExamQuestionController::class)
    ->group(function () {
        Route::get('/', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });
