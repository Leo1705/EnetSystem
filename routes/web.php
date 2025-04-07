<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//people management to fix
Route::get('/people-management', function () {
    return view('peapole');
})->middleware(['auth'])->name('people-management');
//dashboard is done
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//course details is done
Route::get('/course-details', function () {
    return view('course-details');
})->middleware(['auth'])->name('course-details');

Route::get('/courses', function () {
    return view('courses');
})->middleware(['auth'])->name('courses');

Route::get('/attendance', function () {
    return view('attendance');
})->middleware(['auth'])->name('attendance');
//course group !to-do
Route::get('/course-group', function () {
    return view('course-group');
})->middleware(['auth'])->name('course-group');
require __DIR__.'/auth.php';
