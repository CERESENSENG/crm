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
Route::get('/admin', [StudentController::class, 'index'])->name('admin.dashboard');

Route::get('/home', function () {
    return view('index');
});

// Route::get('/show',[StudentController::class,'index'])->name('student_reg');


 Route::get('/register', [StudentController::class, 'registrationPage1'])->name('register.page1');
Route::post('/register', [StudentController::class, 'store'])->name('register.store1');
Route::get('/register/continue/{id}', [StudentController::class, 'registrationPage2'])->name('register.page2');
Route::post('/register/continue/{id}', [StudentController::class, 'store2'])->name('register.store2');
Route::get('/success', function () {
    return view('success');
})->name('SuccessPage');
