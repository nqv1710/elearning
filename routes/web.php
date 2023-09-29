<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CategoriesCourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\LessonController;
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


// Users
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories-course', CategoriesCourseController::class);
    Route::resource('courses', CoursesController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('quizzs', QuizzController::class);

});



// Route::resource('users', UserController::class);

// Courses

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/', function () {
    return view('index');
});
