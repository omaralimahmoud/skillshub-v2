<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\ExamController;
use App\Http\Controllers\dashboard\ExamQuestionController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\MessageController;
use App\Http\Controllers\dashboard\SkillController;
use App\Http\Controllers\dashboard\StudentController;
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
    //exams
    Route::resource('/exams', ExamController::class);
    Route::get('exams/toggle/{exam}', [ExamController::class, 'toggle'])->name('exams.toggle');
    //question
    Route::prefix('exams/{exam}/questions')
        ->name('exams.questions.')
        ->controller(ExamQuestionController::class)
        ->group(function () {
            Route::get('/show', 'show')->name('show');
            Route::get('/', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/edit/{question}', 'edit')->name('edit');
            Route::PUT('/{question}', 'update')->name('update');

        });

    // student
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/open-exam/{studentId}/{examId}', [StudentController::class, 'openExam'])->name('students.openExam');
    Route::get('/students/close-exam/{studentId}/{examId}', [StudentController::class, 'closeExam'])->name('students.closeExam');
    // Admins
    Route::middleware('role:superAdmin')->group(function () {
        Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
        Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('/admins/store', [AdminController::class, 'store'])->name('admins.store');
        Route::get('/admins/promote/{id}', [AdminController::class, 'promote'])->name('admins.promote');
        Route::get('/admins/demote/{id}', [AdminController::class, 'demote'])->name('admins.demote');
    });
    //Messages
    Route::resource('/messages', MessageController::class)->only('index', 'show');
    Route::post('/messages/response/{message}', [MessageController::class, 'response'])->name('messages.response');
});
