<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', fn() => view('welcome'));

// Bring in the auth scaffolding (login, logout, register, etc.)
require __DIR__.'/auth.php';



/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');

    // People Management
    Route::view('/people-management', 'people-management')
         ->name('people-management');

    // Courses List
    Route::view('/courses', 'courses')->name('courses');

    // Course Details
    Route::view('/course-details', 'course-details')
         ->name('course-details');

  // routes/web.php

Route::get('/attendance',   [AttendanceController::class, 'index'])
     ->name('attendance.index');

Route::post('/attendance',  [AttendanceController::class, 'store'])
     ->name('attendance.store');


    // Course Group
    Route::view('/course-group', 'course-group')
         ->name('course-group');
         
});
