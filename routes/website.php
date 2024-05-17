<?php

use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\Exam\ExamController;
use App\Http\Controllers\Website\Exam\ExamQuestionController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ProfileController;
use App\Http\Controllers\Website\SkillController;
use Illuminate\Support\Facades\Route;

Route::name('website.auth.')->group(base_path('routes/website/auth.php'));

Route::resource('/', HomeController::class)->only('index');

Route::resource('categories', CategoryController::class)->only('show');

Route::resource('skills', SkillController::class)->only('show');
Route::resource('exams', ExamController::class)->only(['show']);

Route::resource('contact', ContactController::class)->only(['index', 'store']);
Route::resource('profile', ProfileController::class)->only('index')->middleware(['auth:web', 'verified:website.website.auth.verification.notice', 'role:student']);
// custom route
Route::prefix('exams/{exam}/questions')
    ->name('exams.questions.')
    ->controller(ExamQuestionController::class)
    ->group(function () {
        Route::get('/', 'create')->name('create')->middleware(['auth:web', 'verified:website.website.auth.verification.notice', 'role:student']);

        Route::post('/', 'store')->name('store')->middleware(['auth:web', 'verified:website.website.auth.verification.notice', 'role:student', 'can-enter-exam']);

        Route::post('/submit', 'submit')->name('submit')->middleware(['auth:web', 'verified:website.website.auth.verification.notice', 'role:student']);

    });
