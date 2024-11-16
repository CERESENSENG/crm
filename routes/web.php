<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Payments_schedule_controller;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Department;
use App\Models\Payment;
use App\Models\Payment_schedule;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromoController;


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











Route::get('/promo-page', [PromoController::class, 'index'])->name('promo.index');

// COMMENT:  No department default data in the table , You need to create depart seeder

  // COMMENT:  You need to change the content of welcome page to Home page, where it will display links to diiff pages: registration page, payment page, admin page etc.ec.

Route::get('/', function () {return view('index');})->name('index');
Route::get('/homePage', function(){return view('home');})->name('home.page');

Route::get('/registration/steps', function(){return view('application.registration'); })->name('registration.steps');
Route::get('/about', function(){ return view('about');})->name('about.page');

Route::get('/home',[AdmissionController::class, 'getAppnoToHome'])->name('appNo.home');
Route::get('/available/programs',[DepartmentController::class, 'availablePrograms'])->name('avail.programs');

//CERTIFICATE ROUTE

Route::post('/certificate',[StudentController::class, 'verifyCert'])->name('verify.certificate');


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
Route::get('/payment/back',[Payments_schedule_controller::class,'verifyPaystackTxn'])->name('payment.verify');
Route::get('/payment/receipts', [Payments_schedule_controller::class, 'genReceipts'])->name('payment.receipts');


 //OUTSTANDING PAYMENTS ROUTE
 Route::get('/outstanding/page', [PaymentsController::class , 'outstanding'])->name('outstanding.page');
 Route::post('/outstanding/cart',[PaymentsController::class,  'getExistingPayment'])->name('getexisting.payment');
 Route::post('confirm/outstanding/cart',[PaymentsController::class,  'genConvinienceFees'])->name('confirm.paymentcart');
 Route::post('/outstanding/initialize',[PaymentsController::class,  'outstandingPayment'])->name('payment.outstandingInit');
 Route::get('outstanding/payment/callback',[PaymentsController::class,'checkoutstandingPaystackTxn'])->name('outstanding.callback');
 Route::get('outstanding/receipts',[PaymentsController::class,'genoutReceipts'])->name('outstanding.receipts');







// Route::get('/students/load',[StudentController::class, 'loadSearchPage'])->name('students.load');
// Route::post('/student/search',[StudentController::class, 'searchStudent'])->name('student.search');


// Route::get('/student/enroll/confirm',[StudentController::class, 'studentEnroll'])->name('confirm.enroll');





// COMMENT: How many dashboard so you want to ahave ?  there is home after login
// Route::get('/admin', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('admin');

 // COMMENT:  What are you using this one for ?

 // they are for laravel breeze

 //Route::get('/admin', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('admin');
Route::middleware(['auth', 'verified'])->group(function () {


Route::get('/dashboard',[StudentController::class, 'index'])->name('admin');

Route::get('/student/search',[StudentController::class, 'searchStudent'])->name('student.search');
Route::get('/student/view',[StudentController::class,'view'])->name('student.view');
Route::get('/student',[StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}',[StudentController::class, 'update'])->name('edit.stage-1.store');
Route::get('/student/continue/{id}',[StudentController::class, 'editStage'])->name('student.edit2');
Route::put('/student/continue/{id}',[StudentController::class, 'updateStage'])->name('edit.stage-2.store');

  //Route::match(['get','post'], 'filter/students',[StudentController::class,'searchStudent'])->name('student.search');

  Route::get('/student/enrollment',[StudentController::class, 'enroll'])->name('student.enroll');
  Route::Post('/student/upload/Page',[StudentController::class, 'upload'])->name('student.upload');
  Route::Post('/student/store',[StudentController::class, 'studentEnroll'])->name('student.storecsv');
  Route::delete('/student/delete',[StudentController::class, 'destroy'])->name('student.destroy');

  //DEPARTMENTS ROUTES
  Route::get('/department/view',[DepartmentController::class, 'index'])->name('viewall.dept');
  Route::post('/department/create',[DepartmentController::class, 'createDept'])->name('create.dept');
  Route::put('/department/edit/{id}',[DepartmentController::class, 'edit'])->name('edit.dept');
  Route::Delete('/department/delete/{id}',[DepartmentController::class, 'destroy'])->name('destroy.dept');

  //USER ROUTES
  Route::get('/user/view',[UserController::class,'index'])->name('viewall.user');
  Route::post('/user/create',[UserController::class,'create'])->name('create.user');
  Route::put('/user/edit/{id}',[UserController::class, 'store'])->name('edit.user');
  Route::delete('/user/delete/{id}',[UserController::class, 'destroy'])->name('destroy.user');

  //PAYMENTS SCHEDULE ROUTES
  Route::get('/payments/schedule/view',[Payments_schedule_controller::class, 'showSchedule'])->name('view.schedule');
  Route::Post('/payments/schedule/create',[Payments_schedule_controller::class, 'createSchedule'])->name('create.schedule');
  Route::put('/payments/schedule/edit/{id}',[Payments_schedule_controller::class, 'updateSchedule'])->name('edit.schedule');
  Route::delete('/payments/schedule/edit/{id}',[Payments_schedule_controller::class, 'deleteSchedule'])->name('delete.schedule');


 //PAYMENTS ROUTE
 Route::get('/payments/view',[PaymentsController::class,'index'])->name('view.payment');
 Route::get('/payments/filter',[PaymentsController::class,'filterPayments'])->name('search.payment');
 Route::get('/payment/upload',[PaymentsController::class, 'uploadPage'])->name('upload.page');
 Route::post('/payment/upload/page',[PaymentsController::class, 'uploadPayments'])->name('payment.upload');
 Route::post('/payment/store/page',[PaymentsController::class, 'storePayments'])->name('payment.storecsv');



 //Certification Route

 Route::get('/certificate/page', [StudentController::class,  'certificateUploadPage'])->name('page.certificate');
 Route::post('/certificate/upload', [StudentController::class, 'certificateUpload'])->name('upload.certificate');
 Route::put('/certificate/store', [StudentController::class, 'certificateStore'])->name('certificate.storecsv');
 Route::get('/certificate',[StudentController::class, 'showCertificate'])->name('viewall.certificate');
 Route::put('/certificate/edit/{student_id}',[StudentController::class, 'editCertificate'])->name('edit.certificate');
 Route::get('/certificate/search',[StudentController::class , 'searchCertificate'])->name('search.certificate');



//lARAVEL BREEZE AUTHENTICATION ROUTES
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
