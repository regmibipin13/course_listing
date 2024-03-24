<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InstructorsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/courses/{course}', [FrontendController::class, 'courseDetails'])->name('frontend.courseDetails');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Resource Routes for Instructors and Courses
    Route::resource('instructors', InstructorsController::class);
    Route::resource('courses', CoursesController::class);
});
