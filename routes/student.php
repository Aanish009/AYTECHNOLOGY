<?php

use App\Http\Controllers\Student\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/courses', [DashboardController::class, 'courses'])->name('courses');
    Route::get('/courses/{course}', [DashboardController::class, 'courseDetail'])->name('courses.show');
    Route::get('/courses/{course}/lecture/{lesson}', [DashboardController::class, 'lecture'])->name('lecture');
    Route::post('/courses/{course}/lesson/{lesson}/complete', [DashboardController::class, 'markLessonComplete'])->name('lesson.complete');
    Route::get('/progress', [DashboardController::class, 'progress'])->name('progress');
    Route::get('/quizzes', [DashboardController::class, 'quizzes'])->name('quizzes');
    Route::get('/quizzes/{quiz}', [DashboardController::class, 'quizDetail'])->name('quizzes.show');
    Route::get('/materials', [DashboardController::class, 'materials'])->name('materials');
    Route::get('/refer', [DashboardController::class, 'refer'])->name('refer');
    Route::get('/support', [DashboardController::class, 'support'])->name('support');
    Route::get('/mentors', [DashboardController::class, 'mentors'])->name('mentors');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::get('/certificates', [DashboardController::class, 'certificates'])->name('certificates');
});
