<?php

use App\Http\Controllers\ProfileController;
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


// COMMENT:  No department default data in the table , You need to create depart seeder


  // COMMENT:  You need to change the content of welcome page to Home page, where it will display links to diiff pages: registration page, payment page, admin page etc.ec.

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('admin');

Route::get('/home', function () {
    return view('index');
});

// Route::get('/show',[StudentController::class,'index'])->name('student_reg');


// COMMENT: You need to read more about d best practice for name conventional for route and other methods. I will send d link.
// All these uris haave been changed.
Route::get('/application/register/stage-1', [StudentController::class, 'applicationRegister_Stage1'])->name('register.stage-1');
Route::post('/application/register/stage-1', [StudentController::class, 'applicationStore_Stage1'])->name('register.stage-1.store');
Route::get('/application/register/stage-2/student/{id}', [StudentController::class, 'applicationRegister_Stage2'])->name('register.stage-2');
Route::post('application/register/stage-2/student/{id}', [StudentController::class, 'applicationStore_Stage2'])->name('register.stage-2.store');
Route::get('/application/message/{id}',[StudentController::class, 'applicationMessage'])->name('register.message');
Route::get('/application/slip',[StudentController::class, 'ShowApplicationSlip'])->name('application.slip');

// COMENT:   I have git ignore the public/upload   folder so that git wont store any passport, check  .gitignore


// COMMENT: How many dashboard so you want to ahave ?  there is home after login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

 // COMMENT:  What are you using this one for ?
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';