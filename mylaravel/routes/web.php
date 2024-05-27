<?php

use App\Http\Controllers\StudentController;
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
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/index', function () {
    return view('index');
});
Route::get('/register',[StudentController::class,'Registration_Page'])->name('student_reg');
Route::get('/register2',[StudentController::class,'Registration_Page2'])->name('student_reg2');
