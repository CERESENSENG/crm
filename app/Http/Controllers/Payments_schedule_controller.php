<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\student;
use App\Models\department;
use App\Models\Payment_schedule;
use App\Models\Payment;
use App\Models\Setting;
use DateTime;
use Illuminate\Support\Facades\Redirect;

class Payments_schedule_controller extends Controller
{

  public function index()
  {

    return view('payments.details');
  }


  public function getDetails(Request $request)
  {
    $appNo = $request->app_no;
    
    $status = 1;
    $student = student::where('app_no', $appNo)->first();
    $current_Date = date('F d,Y h:i:s A');
    

    if ($student===null){

      return redirect()->back()->with('message', 'Record not found');

    }

    $checkAdmissionStatus = student::where('app_no', '=', $appNo)
    ->where('status', '=', $status)
    ->first();

    // $stdId = $checkAdmissionStatus->id;


  if($checkAdmissionStatus===null){
    return  redirect()->back()->with('message', 'You have not been offered admission');

  } 

  $stdId = $checkAdmissionStatus->id;

    $checkPaymentStatus = payment::where('student_id',$stdId)
    ->where('status',  'success')
    ->first();
  
    if($checkPaymentStatus){
      
    $invoice = $checkPaymentStatus->invoice;
    $reference = $checkPaymentStatus->transaction_reference;
      
      return redirect()->route('outstanding.receipts',['invoice'=>$invoice,'reference' => $reference] );

    }else{
      $dept_id = $student->department_id;
      $cohort = $student->cohort;
      $year = $student->admission_year;
      $schedule = Payment_schedule::where('cohort', $cohort)
        ->where('department_id', $dept_id)
        ->where('year', $year)->value('amount');
        
  
      // $purpose = Payment_schedule::where('department_id', $dept_id)->value('purpose');
      // dd($purpose);

      $getDetails = Payment_schedule::where('department_id', $dept_id)->first();

      $purpose = $getDetails->purpose;
      $amount_due = $getDetails->amount;


        

        // dd($schedule);

      $bytes = openssl_random_pseudo_bytes(16);
      $m = strtoupper(substr(bin2hex($bytes), -10));
      $uniq = substr(hexdec(uniqid()), -5);
      $ran = mt_rand(10000, 99999);
      $txn = str_shuffle($m . $ran . $uniq);
      $inv = 'INV' . str_shuffle($m . $ran . $uniq);
      $students = $student->email;
      $student_id = $student->id;
      $deptId = $student->department_id;

      return view('payments.cart', compact('schedule',
       'txn', 'students', 'student_id', 'deptId', 'inv','purpose','amount_due'));
    }

  }

  


  public function SchoolfeePaystackInit(Request $request)

  {
    $transactionRef = $request->input('transaction_reference');
    $student = $request->student_id;
    $amount = $request->amount;
    $paymentOption = $request->input('payment_option');
    $email = $request->email;
    $inv = $request->inv;
    $deptId=$request->department_id;
    $purpose = $request->purpose;
    $amount_due = $request->amount_due;
    //  dd($amount);

    if($amount < 2500){

      $totalAmount= $amount/(1-(1.5/100)) + 0.03;

      // dd($totalAmount);

    }else if ($amount > 2500){

         $totalAmount = $amount/(1-(1.5/100)) + 100;

        //  dd($totalAmount);
    }

    $convinientCharges = $totalAmount - $amount;

      // dd($convinientCharges);
    
    if($convinientCharges > 2000){

      $Charges = 2000;

      $convinientCharges = $Charges;
     }

    $amountPaid=  $amount + $convinientCharges;

    $amountToPaystack = ceil((int)$amountPaid);
    

    $store = Payment::create([
      'transaction_reference' => $transactionRef,
      'student_id' => $student,
      'amount' => $amount,
       'amount_due' => $amount_due,
      'payment_option' => $paymentOption,
      'invoice' => $inv,
       'schedule_id' => $deptId,
       'purpose' => $purpose,
    
    ]);


    $url = "https://api.paystack.co/transaction/initialize";

    $fields = [
      'email' => $email,
      'amount' => $amountToPaystack * 100,
      'reference' => $transactionRef,
      'callback_url' => 'http://localhost:8000/payment/callback',
      'metadata' => json_encode([
                   'deptId' => $deptId,
                  //  'amount_due' => $amount_due,

      ])

    ];
    //  dd($val);


    $fields_string = http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      // "Authorization: Bearer sk_test_28f9b65e7898a29933a94de23464bf59d71eb088",
      "Authorization: Bearer " . config('services.secret_key.key'),

      "Cache-Control: no-cache",
    ));

    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



    //execute post
    $result = curl_exec($ch);
    //  echo $result;
    $new = json_decode($result, true);
    //  var_dump($new);
    $payment_url = $new['data']['authorization_url'];

    return redirect::to($payment_url);


    
  }

  public function checkSchFeePaystackTxn(request $request)
  {
    $transactionRef = $request->query('trxref');

    $check = Payment::where('transaction_reference', $transactionRef)->first();
    if ($check->exists()) {

      return $this->verifyPaystackTxn($transactionRef);

      //  redirect()->route('payment.verify',compact('txnRef'));
    } else
      return redirect()->back()->with('message', 'Payment could not be validated');
  }

  public function verifyPaystackTxn($transactionRef)
  {


    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.paystack.co/transaction/verify/$transactionRef",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        // "Authorization: Bearer sk_test_28f9b65e7898a29933a94de23464bf59d71eb088",
        "Authorization: Bearer " . config('services.secret_key.key'),

        "Cache-Control: no-cache",
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {

      // dd($response);
      $responses = json_decode($response);
      $status = $responses->data->status;
      $gatewayRes = $responses->data->gateway_response;
      $signature = $responses->data->authorization->signature;
      $paymentDate = $responses->data->paid_at;
      // $formatDate= date('d/m/Y', strtotime($paymentDate));
      $reference = $responses->data->reference;
      $amount = $responses->data->amount;
      $deptId = $responses->data->metadata->deptId;
      // $amount_due = $responses->data->metadata->amount_due;
        
      // dd($deptId);
      $amountInNaira = ($amount / 100);
      
      $pay = Payment::where('transaction_reference', $transactionRef)->first();

      $invoice = $pay->invoice;

      if($status == 'success'){
        $storeTransaction = [
          'transaction_reference' => $reference,
          'status' => $status,
          'gateway_response' => $gatewayRes,
          'signature' => $signature,
          'payment_date' => $paymentDate,
        
        ];
  
        $pay->update($storeTransaction);

        return redirect()->route('outstanding.receipts', ['reference' => $reference, 'invoice'=>$invoice]);
        
      }
      else return redirect('home.page')->with('message','payment could no be verified');
   }




   
  }
  public function genReceipts(request $request)
  {
    $appNo = $request->app_no;

    if(isset($appNo)){
        
     $stdId = student::where('app_no',$appNo)->value('id');
       
      $payment = payment::with('student', 'schedule')
      ->where('student_id', $stdId)
      ->where('status', 'success')
      ->first();

    }
    if ($payment) {
      $student = $payment->student;
      return view('payments.outstanding-receipts', compact('payment','student'));
      // return view('payments.receipt', compact('payment', 'student',));
    } else return view('error');


  
    $reference = $request->reference;

    if(isset($reference)){

      $payments = Payment::with('student','schedule')
      ->where('transaction_reference', $reference)
      ->where('status', 'success')
      ->first();

    }
          
    
    // if($payments){
    //   $student = $payments->student;
      
    //   return view('payments.outstanding-receipts', compact('payments','student'));
    // }



  }

  public function  showSchedule(){
    
    $payments = Payment_schedule::with('department')->get();
    $years = $this->getYear();
    $cohorts = $this->getCohorts();
    $depts = $this->deptId();
   
     
    return view('payment_schedule.view',compact('payments','years','cohorts','depts'));

  }

  public function createSchedule(Request $request)
  {  
    // dd($request->cohort);
    $validate= $request->validate([
      'cohort' => 'required|string',
       'department_id' => 'required|string',
      'year' => 'required|string',
      'amount' => 'required|string',
      'purpose' => 'required|string',

   ]);

   $schedule=Payment_schedule::create($validate);

   return redirect()->back()->with('message','New schedule Added Succesfully');



  }

  public function updateSchedule(Request $request ,$id)
  { 
    $id=$request->id; 
    // dd($request->cohort);
    $validate= $request->validate([
      'cohort' => 'required|string',
       'department_id' => 'required|string',
      'year' => 'required|string',
      'amount' => 'required|string',
      'purpose' => 'required|string',

   ]);

   $schedule=Payment_schedule::find($id);

   $schedule->update($validate);

   return redirect()->back()->with('Success',' schedule Updated  Succesfully');



  }
  public function deleteSchedule(Request $request, $id)
  {  $id = $request->id;
    // dd($id);
      $schedule = Payment_schedule::find($id);
      $schedule->delete();

      return redirect()->back()->with('confirm','Record Deleted Successfully');
      
  }





}
