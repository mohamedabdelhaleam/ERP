<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Language\LanguageController;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
});

// Language switching route (available to all)
Route::get('/language/{locale}', LanguageController::class)
    ->name('language.switch')
    ->where('locale', 'en|ar');


