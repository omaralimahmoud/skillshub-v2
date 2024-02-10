<?php

use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\Exam\ExamController;
use App\Http\Controllers\Website\Exam\ExamQuestionController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\SkillController;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class)->only('index');

Route::resource('categories', CategoryController::class)->only('show');

Route::resource('skills', SkillController::class)->only('show');

Route::resource('exams', ExamController::class)->only(['show']);
// custom route
Route::prefix('exams/{exam}/questions')
    ->name('exams.questions.')
    ->controller(ExamQuestionController::class)
    ->group(function () {
        Route::get('/', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });
