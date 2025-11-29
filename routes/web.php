<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\EmployeeController;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    // Department CRUD routes
    Route::resource('departments', DepartmentController::class);
    Route::patch('departments/{department}/toggle-status', [DepartmentController::class, 'toggleStatus'])->name('departments.toggle-status');

    // Job Title CRUD routes
    Route::resource('job-titles', JobTitleController::class);
    Route::patch('job-titles/{jobTitle}/toggle-status', [JobTitleController::class, 'toggleStatus'])->name('job-titles.toggle-status');

    // Employee CRUD routes
    Route::resource('employees', EmployeeController::class);
    Route::patch('employees/{employee}/toggle-status', [EmployeeController::class, 'toggleStatus'])->name('employees.toggle-status');
});

// Language switching route (available to all)
Route::get('/language/{locale}', LanguageController::class)
    ->name('language.switch')
    ->where('locale', 'en|ar');
