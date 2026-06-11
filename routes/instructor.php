<?php

use App\Http\Controllers\Instructor\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
