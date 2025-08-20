<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PersonController;


Route::get('/', fn() => view('welcome'));

require __DIR__.'/auth.php';




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');

Route::view('/courses', 'courses')->name('courses.index');


Route::resource('people', PersonController::class);

Route::view('/course-details',    'course-details')
     ->name('course-details');



Route::get('/attendance',   [AttendanceController::class, 'index'])
     ->name('attendance.index');

Route::post('/attendance',  [AttendanceController::class, 'store'])
     ->name('attendance.store');
     
Route::get('/attendance/events', [AttendanceController::class,'events']);


    Route::view('/course-group', 'course-group')
         ->name('course-group');
         
});
