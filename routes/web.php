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

Auth::routes();  

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.show');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('storeToDb.store');  
Route::get('/home/course/{course}/edit', [App\Http\Controllers\CourseController::class, 'select'])->name('selectCourse.edit');
Route::patch('/home/course/{course}/update', [App\Http\Controllers\CourseController::class, 'update'])->name('selectCourse.update');
Route::get('/home/course/{course}/remove', [App\Http\Controllers\CourseController::class, 'remove'])->name('selectCourse.destroy');
Route::get('/home/course/{course}/cancel', [App\Http\Controllers\CourseController::class, 'cancel'])->name('selectCourse');
