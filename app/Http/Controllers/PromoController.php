<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Services\ApplicationService;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Notifications\SendApplicationNotification;
use Illuminate\Database\Events\TransactionBeginning;
use App\Models\Payment_schedule;
use App\Services\InvoiceService;
use App\Services\PaymentService;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //$promo  = Promo::all();
       return view('promo.home');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ApplicationService $appService)
    {

        //
        $validate =  $request->validate([
            'surname' => ['required','string','max:255'],
            'firstname' => ['required','string','max:255'],
            'phone' => ['required','string'],
            'email' => ['required','string','email:rfc,dns','max:255','unique:applications'],
            'address' => ['required','string'],
            'course' => ['required','array','min:3','max:3']

          ],[
              'course.min' => 'You must select three courses'
          ]);


        // $cohort = Setting::where('item', 'cohort')->value('value');
         $cohort  =  app('settings')['cohort'];
         $dept =  Department::getDeptByCode('PROMO');
         $dept_id = $dept ?  $dept->id: 81;
         $session =  app('settings')['session'] ?? date('Y');

         // put it inside info
         $info['address'] = $request->address;
         $info['course'] =  implode(',',$request->course);
          $info['cohort'] = $cohort;
          $info['session'] = $session;
          $info['phone'] =   $request->phone;


            // initial app variable
         $app['surname'] =   $request->surname;
         $app['firstname'] =   $request->firstname;

         $app['email'] =   $request->email;
         $app['app_no'] =    Student::generateAppNo($session);
         $app['info'] =   json_encode($info);
         $app['department_id'] = $dept_id;
         $app['stage'] = 1;

             try{


                DB::beginTransaction();

                 $std =  $appService->store($app);

                 try {
                 // send notification  message to applicant
                 $std->notify(new  SendApplicationNotification($std->firstname,$std->app_no,$session, $cohort));
                 }
                 catch (\Exception $emailException) {

                    DB::rollBack();

                    $err_message =   $emailException->getMessage();
                     \Log::error($err_message);
                     return redirect()->back()->with('error', 'critical error occurred  while processing email notification, try again later! or contact  support team');

                 }

                 DB::commit();
                  return  redirect()->to(route('promo.message',$std->app_no))->send();


             }
             catch (\Exception $err) {

                $err_message = $err->getMessage();
                \Log::error($err_message);
                DB::rollBack();
                  return redirect()->back()->with('error', 'Something went wrong while proccessing your registration. Please try again later  or contact support team');

            }












    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function register()
    {
        //
           //session()->put('success', 'test success message');
        $courses =  ['Web Development', 'UI/UX Design', 'Cyber Security', 'Data Analysis','Mobile Development'];
        return view('promo.register',compact('courses'));
    }


    public function  slip($app_no, ApplicationService $appservice, StudentService $studservice, PaymentService $payservice)
    {

         try {



        $student =  $studservice->getStudentByAppNo($app_no);
         // dd($student);
         if($student)
           {
            $pay =  $payservice->getPaymentByPurpose($student->id, 'sch_fee');
             if(!$pay)
               return redirect()->to(route('promo.register'))->with('error', 'Payment information is not found for this applicant! if you have made the payment, Go and requery the payment');
           }
               else
            return redirect()->to(route('promo.register'))->with('error', 'Invalid applicant!');

        }
          catch (\Exception $e) {
          //  $err_message = $e->getMessage();
            \Log::error($e->getMessage());
              return redirect()->to(route('promo.register'))->with('error', 'Something went wrong  during application slip generation!');
            }

       $student = Student::where('app_no', $app_no)->first();


       return view('promo.slip',compact('student','pay'));
    }


    public function  screenMessage($app_no,ApplicationService $appService)
    {

          try{

             $app =  $appService->getApp($app_no);


          }
          catch (\Exception $e) {
          //  $err_message = $e->getMessage();
            \Log::error($e->getMessage());
              return redirect()->to(route('promo.register'))->with('error', 'Something went wrong!');
            }

        return view('promo.message',compact('app'));
    }


    public function  cart($app_no,ApplicationService $appService,  PaymentService $payService, StudentService $studservice)
    {

          try{


            $student =  $studservice->getStudentByAppNo($app_no);
            // dd($student);
              if($student)
               return redirect()->to(route('promo.register'))->with('error', ' Student information found for this applicant! Go to application slip to reprint it.');


              $session = strval(app('settings')['session']);
              $cohort = strval(app('settings')['cohort']);




             $app =  $appService->getApp($app_no);



             $dept =  Department::getDeptByCode('PROMO');
             $dept_id = $dept ?  $dept->id: 81;

              $pay_sch =  Payment_schedule::getScheduleByDept($dept_id,'sch_fee');
              $amount = $pay_sch ? $pay_sch->amount : 150000;
              $pay_schedule_id = $pay_sch ? $pay_sch->id:0;

              $charges =  $payService->get_actual_charges($amount,'paystack');

               $total =  $amount + $charges;

                      $genTx  =  $payService->generateTxn();
               $str = 'C'.$cohort.substr($session,-2).$genTx;

               $txn_ref  =    $payService->formatString($str);
               //  preg_replace('/(\d{4})(?=\d)/', '$1-', $str);

               $invoice =     $payService->formatString('INV'.$payService->generateTxn());
               //   preg_replace('/(\d{4})(?=\d)/', '$1-', 'INV'.$genTx);    ;



          }
          catch (\Exception $e) {
          //  $err_message = $e->getMessage();
            \Log::error($e->getMessage());
              return redirect()->to(route('promo.register'))->with('error', 'Something went wrong!');
            }

        return view('promo.cart',compact('app','amount','charges','total','txn_ref','invoice','pay_schedule_id','session','cohort'));
    }




    public function  checkout(Request $request, StudentService $studservice,  PaymentService $payservice,
      InvoiceService $invoiceservice )
    {


        $validate =  $request->validate([
            'surname' => ['required','string','max:255'],
            'firstname' => ['required','string','max:255'],
            'phone' => ['required','string'],
            'app_no' => ['required','string','exists:applications'],
            'email' => ['required','string','email:rfc,dns','max:255'],
            'session' => ['required','string'],
            'cohort' => ['required','string'],
            'amount' => ['required', 'string'],
            'total' => ['required','integer'],
            'gateway' => ['required','string'],
            'txn_ref' => ['required','string'],
            'invoice' => ['required','string'],
            'invoice' => ['required','string'],
            'schedule_id' => ['required']

          ]);




          $student =  $studservice->getStudentByAppNo($request->app_no);
         // dd($student);
           if($student)
            return redirect()->to(route('promo.register'))->with('error', ' Student information found for this applicant! Go to application slip to reprint it.');

            // $pay =  $payservice->getPaymentByPurpose($student->id, 'sch_fee');
            //  if(!$pay)
            //    return redirect()->to(route('promo.register'))->with('error', 'Payment information is not found for this applicant! if you have made the payment, Go and requery the payment');


        //     else {


        //    }



              // create invoice

              try{

                $payload['session'] = $validate['session'];
                $payload['cohort']  = $validate['cohort'];
                $payload['schedule_id']  = $validate['schedule_id'];


                $inv =  [
                    ...['status'=>0,'total'=>doubleval($request->amount)],
                ...['payload'=>json_encode($payload)],
                ...$request->only('surname','firstname','txn_ref','invoice','schedule_id','app_no')
                 ];

               // dd($inv);
                  $invoiceservice->store($inv);


              }
              catch (\Exception $e) {
                //  $err_message = $e->getMessage();
                  \Log::error($e->getMessage());
                    return redirect()->to(route('promo.register'))->with('error', 'Something went wrong!');

                }

                  return redirect()->to(route('promo.initialize.txn',$request->txn_ref))->send();

       // return view('promo.cart',compact('app','charges','total','txn_ref','invoice','pay_schedule_id','session','cohort'));
    }



    function initializeTx($tx_ref, InvoiceService $invoiceservice, PaymentService $payservice)
     {

         // initialize paystack transaction

             $invoice =  $invoiceservice->getByTxref($tx_ref);

              $secrete_key =  config('services.secret_key.key');
             $init_url =   "https://api.paystack.co/transaction/initialize" ;
             $callback_url =  route('promo.verify.txn');


               $app =  (new ApplicationService())->getApp($invoice->app_no);
                  $app_payload = json_decode($app->info);

                 // dd($app_payload);


             $name =  $invoice->surname.' '.$invoice->firstname;
             $email =  $app->email;
             $phone =  $app_payload->phone;
             $amount =   $invoice->total*100;
             $tx_ref =  $invoice->txn_ref;


           try
             {

                 $res =  $payservice->initialize( $name, $email, $phone, $amount, $tx_ref,$secrete_key,$init_url,$callback_url);

                 if($res['status'])
                 {

                      if(!$res['data']['status'])
                      {
                       \Log::error($res['message']);
                          $msg = 'OHHHH!!!!  ::: Something went wrong  during payment processing, pls try again later or report the issue to the customer support!';

                          return redirectWithMsg(route('promo.register'),$msg) ;
                      }
                       else
                       return \Redirect::to($res['data']['data']['authorization_url'])->send();


                 }
                 else{

                     Log::error($res['message']);
                     $msg = 'OHHHH!!!!  :::  SOMETHING WENT WRONG DURING PAYMENT PROCESSING :: INCASE YOU HAVE GEBERATED AN INVOICE BFORE, GO TO MAIL YOU RECEIVED AND 'CLICK ON PROCEED TO PAYMENT' BUTTON';
                     return redirectWithMsg(route('promo.register'),$msg) ;

                 }



                }
          catch (\Exception $e) {
            //  $err_message = $e->getMessage();
              \Log::error($e->getMessage());
              $msg = 'OHHHH!!!!  ::: Something went wrong  during payment processing, pls try again later or report the issue to the customer support!';
              return redirectWithMsg(route('promo.register'),$msg) ;


            }

     }




      function verifyTx(Request $request, InvoiceService $invoiceservice, ApplicationService $appservice,
      PaymentService $payservice, StudentService $studservice

      )
      {

         // verify paystack transaction
         $tx_ref = $request->reference;

           $invoice =   $invoiceservice->getByTxref($tx_ref);

           if(!$invoice)
           return redirectWithMsg(route('promo.register'),'Txn Ref is not found!','error');

           if($invoice->status == 1 )
             {
               //$purpose = $invoice->payload[0]['purpose'];
                if($payservice->getByTxnRef($tx_ref))
                // GOTO REDIRECT_TO_ACTUALPAGE;
                 return redirectWithMsg(route('promo.register'),'Txn Ref is already verified or paid, Go to Continue Application to print out the slip!','error');

             }

             $secrete_key =  config('services.secret_key.key');
             $verify_url =   "https://api.paystack.co/transaction/verify/" ;


             $res   =   $payservice->verify($tx_ref,$secrete_key, $verify_url);

             //dd($res);

             if($res['status'])
             {

                 $response =  $res['data'];
                //  dd($schedule->purpose);

               if(  array_key_exists('data', $response)  &&  is_array($response ) ){

                 // \Log::info($response);
                   // dd(2);
                  //   create student
                    //  create payment
                     // update   invoice

           try
             {

                DB::beginTransaction();

                   $app   =  $appservice->getApp($invoice->app_no);
                     $app_info =   json_decode($app->info);

                    // dd($app_info->phone);

                     $invoice_payload =   json_decode($invoice->payload);
                     $stud = [];

                   $stud['app_no'] = $app->app_no;
                   $stud['matric_no'] = $app->app_no;
                   $stud['admission_year'] = $app_info->session;
                   $stud['cohort'] = $app_info->cohort;
                   $stud['surname'] = $app->surname;
                   $stud['firstname'] = $app->firstname;
                   $stud['next_of_kin'] = $app->firstname;
                   $stud['email'] = $app->email;
                   $stud['phone'] = $app_info->phone;
                   $stud['status'] = 1;
                   $stud['address'] = $app_info->address;
                   $stud['class_method'] = 'physical';
                   $stud['department_id'] = $app->department_id;
                   $stud['approved_at'] =   date('Y-m-d H;i:s');
                   $stud['category'] = 'promo';
                   $stud['promo_course'] = $app_info->course;
                   $stud['password'] = bcrypt('password');


                       $student =   $studservice->store($stud);

                      // if($student){

                          $pay = [];
                              $pay['amount'] = $invoice->total;
                              $pay['student_id'] = $student->id;
                              $pay['invoice'] = $invoice->invoice;

                              $pay['schedule_id'] = $invoice_payload->schedule_id;
                              $pay['purpose'] = 'sch_fee';
                              $pay['invoice'] = $invoice->invoice;
                              $pay['transaction_reference'] = $tx_ref;
                              $pay['status'] =   ($response['data']['status'] ==  'success')?1:0;
                              $pay['amount_due'] = $invoice->total;
                              $pay['gateway_response'] =  $response['data']['gateway_response'];
                            //  $pay['authorization_code'] = $response['authorization_code'];
                              $pay['payment_reference'] = (!empty(($response['data']['authorization'])))?$response['data']['authorization']['authorization_code']:'';
                              $pay['payment_date'] =  date("Y-m-d H:i:s", strtotime($response['data']['paid_at']));
                            //  $pay['payment_ref'] = $response['reference'];
                              $pay['gateway'] = 'paystack';
                              $pay['signature'] =  (!empty(($response['data']['authorization'])))?$response['data']['authorization']['signature']:'';

                            //  $pay['signature'] = 1;
                                  $payservice->store($pay);

                                  $invoiceservice->updateStatusByInvoiceNo($invoice->invoice,1);

                                  $appservice->updateAppStage($app->app_no,2);

                                  DB::commit();

                                  return redirectWithMsg(route('promo.slip',$app->app_no),'') ;
                                 // return redirectWithMsg(route('promo.register'),'Payment Successful, Go to Continue Application to print out the slip!','success');

                     //   }




                    }
                    catch (\Exception $e) {


                        //  $err_message = $e->getMessage();
                          \Log::error($e->getMessage());

                          DB::rollBack();

                          $msg = 'OHHHH!!!!  ::: Something went wrong  during payment verification, pls try again later or report the issue to the customer support!';
                          return redirectWithMsg(route('promo.register'),$msg) ;



                        }


               }
               else
               {
                 return redirectWithMsg(route('promo.register'),'Txn Ref is still pending, if you have been debited, wait for a 10 mins and Go to Requery Page  for requery the transaction!','error');

               }

            }
             else
               {

                \Log::error($res['message']);
                $msg = 'OHHHH!!!!  :::  SOMETHING WENT WRONG DURING PAYMENT VERIFICATION ::  PLS TRY AGAIN LATER!';
                return redirectWithMsg(route('promo.register'),$msg);
               }


      }





}
