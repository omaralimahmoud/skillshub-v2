<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix(LaravelLocalization::setLocale())->middleware(LocaleSessionRedirect::class)->group(function () {
    Route::name('website.')->group(base_path('routes/website.php'));

    Route::prefix('dashboard')->name('dashboard.')->group(base_path('routes/dashboard.php'));
});
