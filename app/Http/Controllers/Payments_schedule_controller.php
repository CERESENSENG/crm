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

  if($checkAdmissionStatus===null){
    return  redirect()->back()->with('message', 'You have not been offered admission');

  } 

  $getId=student::where('app_no', $appNo)->value('id');
  // dd($getId);
    $checkPaymentStatus = payment::where('student_id',$getId)
    ->where('status', '=', 'success')
    ->first();
    //  dd($checkPaymentStatus);

    if($checkPaymentStatus){

      return redirect()->route('admission.slip',['app_no'=>$student->app_no]);

    }else{
      $dept_id = $student->department_id;
      $cohort = $student->cohort;
      $year = $student->admission_year;
      $schedule = Payment_schedule::where('cohort', $cohort)
        ->where('department_id', $dept_id)
        ->where('year', $year)->value('amount');

      $bytes = openssl_random_pseudo_bytes(16);
      $m = strtoupper(substr(bin2hex($bytes), -10));
      $uniq = substr(hexdec(uniqid()), -5);
      $ran = mt_rand(10000, 99999);
      $txn = str_shuffle($m . $ran . $uniq);
      $inv = 'INV' . str_shuffle($m . $ran . $uniq);
      $students = $student->email;
      $student_id = $student->id;

      return view('payments.cart', compact('schedule', 'txn', 'students', 'student_id', 'inv'));
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




    $store = Payment::create([
      'transaction_reference' => $transactionRef,
      'student_id' => $student,
      'amount' => $amount,
      'payment_option' => $paymentOption,
      'invoice' => $inv,


    ]);


    $url = "https://api.paystack.co/transaction/initialize";

    $fields = [
      'email' => $email,
      'amount' => $amount * 100,
      'reference' => $transactionRef,
      'student_id' => $student,
      'callback_url' => 'http://localhost:8000/payment/callback',

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
      $formatDate= date('Y-m-d', strtotime($paymentDate));

      $reference = $responses->data->reference;
      $amount = $responses->data->amount;
      $amountInNaira = ($amount / 100);



      $getId = Payment::where('transaction_reference', $transactionRef)->value('id');


      $storeTransaction = [
        'amount' => $amountInNaira,
        'transaction_reference' => $reference,
        'status' => $status,
        'gateway_response' => $gatewayRes,
        'signature' => $signature,
        'payment_date' => $formatDate,
      
      ];

      $payment = payment::with('students')->where('id', $getId)->update($storeTransaction);

      if ($payment == true) {
        return redirect()->route('payment.receipts', ['reference' => $reference]);
      } else return redirect()->back()->with('unable to save', 'transaction could not be completed');
    }
  }
  public function genReceipts(request $request)
  {
    $reference = $request->reference;
    $payment = Payment::with('student')
      ->where('transaction_reference', $reference)
      ->where('status', 'success')
      ->where('gateway_response', 'successful')->first();
    if ($payment) {
      $student = $payment->student;
      return view('payments.receipt', compact('payment', 'student'));
    } else return view('error');
  }
}