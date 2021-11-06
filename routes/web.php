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
})->name("home");
Route::resource('students',StudentController::class)->except([
    'create', 'show', 'edit'
]);
Route::resource('teachers',TeacherController::class)->except([
    'create', 'show', 'edit'
]);
Route::resource('grades',GradeController::class)->except([
    'create', 'show', 'edit'
]);