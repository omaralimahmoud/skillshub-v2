<?php

use App\Http\Controllers\Website\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Website\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Website\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});
