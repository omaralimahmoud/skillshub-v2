<?php

use App\Http\Controllers\Website\Api\V1\CategoryController;
use App\Http\Controllers\Website\Api\V1\ExamController;
use App\Http\Controllers\Website\Api\V1\ExamQuestionController;
use App\Http\Controllers\Website\Api\V1\RegisterUserController;
use App\Http\Controllers\Website\Api\V1\SkillController;
use Illuminate\Support\Facades\Route;

Route::resource('/categories', CategoryController::class)->only(['index', 'show']);
Route::resource('/skills', SkillController::class)->only(['show']);
Route::resource('exams', ExamController::class)->only(['show']);

//Route::get('/examQuestions/{exam}', [ExamQuestionController::class, 'show'])->name('examQuestions.show');

Route::prefix('exams/{exam}/questions')
    ->name('exams.questions.')
    ->controller(ExamQuestionController::class)
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::post('/submit', 'submit');
    });

//Auth
Route::post('/register', [RegisterUserController::class, 'register']);
