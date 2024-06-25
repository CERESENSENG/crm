<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\Payments_schedule_controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Models\student;
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
    return view('index');
});


Route::get('/admin', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('admin');

// Route::get('/test', function () {
//     return view('test');
// });

// Route::get('/show',[StudentController::class,'index'])->name('student_reg');


// COMMENT: You need to read more about d best practice for name conventional for route and other methods. I will send d link.
// All these uris haave been changed.
Route::get('/application/register/stage-1', [StudentController::class, 'applicationRegister_Stage1'])->name('register.stage-1');
Route::post('/application/register/stage-1', [StudentController::class, 'applicationStore_Stage1'])->name('register.stage-1.store');
Route::get('/application/register/stage-2/student/{id}', [StudentController::class, 'applicationRegister_Stage2'])->name('register.stage-2');
Route::post('application/register/stage-2/student/{id}', [StudentController::class, 'applicationStore_Stage2'])->name('register.stage-2.store');
Route::get('/application/message/{id}',[StudentController::class, 'applicationMessage'])->name('register.message');
Route::get('/application/slip',[StudentController::class, 'ShowApplicationSlip'])->name('application.slip');
Route::get('/applicant/details',[StudentController::class,'showApplicantFullDetails'])->name('applicant.FullDetails');

// COMENT:   I have git ignore the public/upload   folder so that git wont store any passport, check  .gitignore

Route::get('/admission',[AdmissionController::class, 'show'])->name('admission.show');
Route::post('admission/approve/{id}',[AdmissionController::class, 'approveStudent'])->name('approve');
Route::post('admission/reject/{id}',[AdmissionController::class, 'rejectStudent'])->name('reject');
Route::get('/admission/slip',[AdmissionController::class, 'admissionSlip'])->name('admission.slip');

    
Route::get('/payment', [Payments_schedule_controller::class, 'index'])->name('index.show');
Route::post('/payment/details', [Payments_schedule_controller::class, 'getDetails'])->name('payment.details');
Route::post('/payment/init',[Payments_schedule_controller::class,'SchoolfeePaystackInit'])->name('payment.init');
Route::get('/payment/callback',[Payments_schedule_controller::class,'checkSchFeePaystackTxn'])->name('payment.callback');
Route::get('/payment/back/{transactionRef}',[Payments_schedule_controller::class,'verifyPaystackTxn'])->name('payment.verify');
Route::get('/payment/receipts/{reference}', [Payments_schedule_controller::class, 'genReceipts'])->name('payment.receipts');




// Route::get('/students/load',[StudentController::class, 'loadSearchPage'])->name('students.load');
// Route::post('/student/search',[StudentController::class, 'searchStudent'])->name('student.search');
Route::match(['get','post'], 'filter/students',[StudentController::class,'searchStudent'])->name('student.search');
Route::get('/student/enrollment',[StudentController::class, 'enroll'])->name('student.enroll');
Route::Post('/student/upload/Page',[StudentController::class, 'upload'])->name('student.upload');
Route::Post('/student/store',[StudentController::class, 'studentEnroll'])->name('student.storecsv');

// Route::get('/student/enroll/confirm',[StudentController::class, 'studentEnroll'])->name('confirm.enroll');




Route::get('/student/view',[StudentController::class,'view'])->name('student.view');
Route::get('/student',[StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}',[StudentController::class, 'update'])->name('edit.stage-1.store');
Route::get('/student/continue/{id}',[StudentController::class, 'editStage'])->name('student.edit2');
Route::put('/student/continue/{id}',[StudentController::class, 'updateStage'])->name('edit.stage-2.store');

    
// COMMENT: How many dashboard so you want to ahave ?  there is home after login
// Route::get('/admin', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('admin');

 // COMMENT:  What are you using this one for ?
 // they are for laravel breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
