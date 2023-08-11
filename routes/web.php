<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AttendanceController::class)->group(function () {
    Route::get('courses/{course:slug}/attendance', 'index')->name('attendance.index');
    Route::get('courses/{course:slug}/attendance/create', 'create')->name('attendance.create');
    Route::post('courses/{course:slug}/attendance', 'store')->name('attendance.store');
    Route::get('courses/{course:slug}/attendance/edit', 'edit')->name('attendance.edit');
    Route::put('courses/{course:slug}/attendance', 'update')->name('attendance.update');
    Route::delete('courses/{course:slug}/attendance', 'destroy')->name('attendance.destroy');
});

Route::resource('student', StudentController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('course', CourseController::class);
