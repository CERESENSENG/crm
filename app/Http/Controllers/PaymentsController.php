<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\Payment;
use App\Models\Payment_schedule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $status = 'success';
    $payments = Payment::with('student')
      ->where('status', $status)
      ->get();
    return view('payments.view', compact('payments'));
  }
  public function paymentMethod()
  {
    $arr = ['half_payment', 'full_payment'];
    return $arr;
  }
  public function status()
  {
    $arr = ['success', 'fail', 'pending'];
    return $arr;
  }

  public function search()

  {
    $options = $this->paymentMethod();
    $statuses = $this->status();
    return view('payments.search', compact('options', 'statuses'));
  }

  public function filterPayments(request $request)
  {

    $invoice = $request->invoice;
    $status = $request->status;
    $paymentOption = $request->payment_option;
    $from =  date('Y-m-d',strtotime($request->from)).' 00:00:00';
    $to = date('Y-m-d',strtotime($request->to)).' 23:59:59';


    $null = (trim($invoice) == '' &&  trim($status) == '' &&  trim($paymentOption) == '' && trim($from) == '' &&  trim($to) == '');

    if (empty($request->all()) ||  $null)
      $students  = [];
    else if ($invoice) {
      $students  =  Payment::whereinvoice($invoice)
        ->get();
    } else if ($from && $to) {
     // $students = Payment::whereBetween('created_at', [$from, $to])->get();
      $students = Payment::where('payment_date','>=', $from)
                          ->where('payment_date','<=', $to)
                           ->where('status','success')
                          ->get();
      
    } else
      $students  =  Payment::when($paymentOption, function ($query) use ($paymentOption) {
          return $query->where('payment_option', $paymentOption);
        })->when($status, function ($query) use ($status) {
          return $query->where('status', $status);
        })

        ->get();


    $studentList = $students;

    //dd($studentList);
    $options = $this->paymentMethod();
    $statuses = $this->status();

    return view('payments.search', compact('studentList', 'options', 'statuses'));
  }

  public function uploadPage()
  {
    return view('payments.upload');
  }

  public function checkStudentId($student_id)
  {
    $student = Student::find($student_id);
    return $student;
  }

  public function uploadPayments(Request $request)
  {

    $validate = $request->validate([
      ['csv' => 'required|file|mimes:csv,txt|max:50'],
      ['mimes:csv,txt' => 'Only CSV accept']

    ]);
    $file = $request->file('csv')->getRealPath();

    $paymentRows = $this->readCsvToArray($file);

    //  dd($paymentRows);  

    $data = [];
    $k = 0;
    $myErr = false;
    $error_in_row = $error_in_csv = false;
    $error = $error_n_matric = false;



    foreach ($paymentRows as $r) {

      $matric_no = $r[0];
      $payment_option = $r[1];
      $purpose = $r[2];
      $payment_reference = $r[3];
      //$gateway = $r[4];
      $amount = $r[4];
      //$status = $r[6];
      //$gateway_reponse = $r[7];
      $schedule_id = $r[5];


      $error_in_row = $error_in_csv = false;
      $error = $error_n_matric = false;

    

      if (
        trim($matric_no) == '' && trim($payment_option) == '' && trim($purpose) == '' &&
        trim($payment_reference) == '' && trim($amount) == '' 
         && trim($schedule_id) == '' 
      ) {

        $error = 'Error ignored';
      } else  if (
        trim($matric_no) == '' || trim($payment_option) == '' || trim($purpose) == '' ||
        trim($payment_reference) == ''  || trim($amount) == '' || trim($schedule_id) == ''
      ) {

        $error_in_csv = true;
        $error_in_row = true;
        $error = 'One of required field(s) omiited .';
        $myErr = true;
        $matric_no='';$student_id=''; $payment_option = ''; $purpose =''; $payment_reference ='';
        $gateway = ''; $amount = ''; $status = ''; $gateway_reponse = ''; $amount_due = ''; $schedule_id ='';
        $transaction_reference = ''; $invoice = ''; $student_name = '';
  


      } else {
        
        $student = $this->checkMatricno($matric_no);
        if($student)
         {
          $dept =$student->department_id;
          $student_id = $student->id;
          $matric_no = $student->matric_no;
           $student_name = $student->surname. ' '. $student->firstname;
  
          $schedule= $this->getSchedule($schedule_id);
          if($schedule){
             if($schedule->department_id !=  $student->department_id )
               {
                $error_in_csv = true;
                $error_in_row = true;
                $error .= ($error)? 'and  wrong payment schedule ID is not match student`s dept. ':' wrong payment schedule ID is not match student`s dept. ';
                $myErr = TRUE;

               }
                $schfee =  Payment::getExistingSchoolFeePayment($student_id);
                if($schfee)
                 $amount_due = $schfee->amount_due;
                  else
                  $amount_due = $schedule->amount; 
  
          }else{
             
            $error_in_csv = true;
            $error_in_row = true;
            $error .= ($error)? 'and Invalid Schedule Id. ':'Invalid Schedule Id. ';
            $myErr = TRUE;

          }

         }else {

          $error_in_csv = true;
          $error_in_row = true;
          $error_n_matric= true;
          $error .= 'Invalid matric_no, ';
          $myErr = TRUE;
           $amount_due = 0;
           $student_name = '';
           $matric_no = '';


         }
        
        
        $invoice = $this->checkInv($schedule_id);
        $transaction_reference = $this->generateTxn();

      

        // if (empty($student)) {
        //   $error_in_csv = true;
        //   $error_in_row = true;
        //   $error_n_matric= true;
        //   $error .= 'Invalid matric_no, ';
        //   $myErr = TRUE;
        // }
        // if(empty($schedule)){
        //   $error_in_csv = true;
        //   $error_in_row = true;
        //   $error .= ($error)? 'and Invalid Schedule Id. ':'Invalid Schedule Id. ';
        //   $myErr = TRUE;
        // }
      

        
      }


      $data[$k]['sn'] = $k + 1;
      $data[$k]['matric_no'] = $matric_no;
      $data[$k]['student_id'] = $student_id;
      $data[$k]['student_name'] = $student_name;
      $data[$k]['payment_option'] = $payment_option;
      $data[$k]['purpose'] = $purpose;
      $data[$k]['payment_reference'] = $payment_reference;
      $data[$k]['gateway'] = '';  //$gateway;
      $data[$k]['amount'] = $amount;
      $data[$k]['status'] = '';  // $status;
      $data[$k]['gateway_response'] = '';  // $gateway_reponse;
      $data[$k]['amount_due'] = $amount_due;
      $data[$k]['schedule_id'] = $schedule_id;
      $data[$k]['transaction_reference'] = $transaction_reference;
      $data[$k]['invoice'] = $invoice;

      $data[$k]['error'] = $error;
      $data[$k]['error_in_matric'] = $error_n_matric;

      if ($error)
        $data[$k]['comment'] = $error;
      else if ($error_in_row)
        $data[$k]['comment'] = $error;
      else
        $data[$k]['comment'] = 'ok';
      $k++;


     // $result = json_decode(json_encode($data));
    }

    //  return $data;
    $result = json_decode(json_encode($data));
    // dd($myErr);

    return view('payments.confirm', ['confirms' => $result, 'CSV_ERR' => $myErr]);
  }

  public function storePayments(request $request)
  {
    $validate = $request->validate(
      [
        'data' => 'required'

      ],
      ['required' => ':attribute is required.']
    );


      $user_name = $request->user()->name;

    foreach ($validate['data'] as $rowStd) {


      $tudent = Payment::create([
        'student_id' =>$rowStd['student_id'],
        'payment_option' => $rowStd['payment_option'],
        'purpose' => $rowStd['purpose'],
        'payment_reference' => $rowStd['payment_reference'],
        'gateway' => 'csv',
        'amount' => $rowStd['amount'],
        'status' => 'success',
        'gateway_response' => 'Payment uploaded by '.$user_name.' via csv',
        'amount_due' => $rowStd['amount_due'],
        'schedule_id' => $rowStd['schedule_id'],
        'transaction_reference' => $rowStd['transaction_reference'],
        'invoice' => $rowStd['invoice'],
        'payment_date' =>  date('Y-m-d H:i:s'),
      ]);
    }
    return redirect()->route('upload.page')->with('success', 'Data stored successfully!');
  }

  public function outstanding()
  {

    return view('payments.balance');
  }




  public function getExistingPayment(request $request)
  {
    $appNo = $request->app_no;

    $std =student::where('matric_no',$appNo)->first();

    if(!$std){

      return redirect('/outstanding/page')->with('message','No record found');
    }

    $pays = payment::where('student_id', $std->id)
    ->where('status', 'success')
    ->get();

    if ($pays->isEmpty()){

      $sch = Payment_schedule::where('department_id', $std->department_id)
      ->where('purpose', 'sch_fee')
      ->first();

      $amount_due = $amount_left = $sch->amount;
      $amount_paid = 0;
      $purpose = $sch->purpose;
      $stdApp = $std->app_no;
      $email =  $std->email; 
       $inv  =  $this->generateInvoice(); 
      //dd(3);

    }else{
      $k = 0;
      $paid = 0;

      foreach($pays as $pay){
        if ($k == 0){
          $amount_due = $pay['amount_due'];
          $invoice = $pay['invoice'];
          $reference = $pay['transaction_reference'];
          $purpose = $pay['purpose'];
        }
        $paid += $pay['amount'];
      }
      // dd($paid);
    
      if($amount_due == $paid){
           
        return redirect()->route('outstanding.receipts',['invoice'=>$invoice,'reference' => $reference] );
      }

      else if ($paid < $amount_due){
        $status = 'success';
        $cart =  Payment::with('student')->where('status', $status)->first();
      $stdApp = $cart->student->app_no;
      $email =  $cart->student->email; 
      $amount_paid = $paid;
       $inv  = $invoice; 
       
        $amount_left = $amount_due - $amount_paid;

        // return view('payments.outstandingCart',compact('stdApp',
        // 'email','amount_due','amount_paid','amount_left','inv','purpose'));
      }



    }

    
    return view('payments.outstandingCart',compact('stdApp',
    'email','amount_due','amount_paid','amount_left','inv','purpose'));

  }

  public function genConvinienceFees(Request $request){
    $purpose = $request->purpose;
    $app_no = $request->app_no;
    $email = $request->email;
    $inv = $request->inv;
    $amount_paid = $request->amount_paid;
    $amount_left =$request->amount_left;
    $amount_due =$request->amount_due;
    $amount_to_pay = $request->amount_to_pay;

   
  
      if($amount_to_pay < 2500){

        $amount = $amount_to_pay/(1-(1.5/100)) +0.03;

       

      } else if($amount_to_pay >2500){

        $amount = $amount_to_pay/(1-(1.5/100)) +100;
  
      }

      $convinience= $amount - $amount_to_pay;

        $convinienceFees =  ceil($convinience);

      
      if($convinienceFees > 2000){

        $Charges = 2000;
  
        $convinienceFees = $Charges;
       }
  
      $amountPaid=  $amount_to_pay + $convinienceFees;
  
      $amountToPaystack = $amountPaid;
      $actual_amount = $amount_to_pay;

      return view('payments.confirm-outstandingCart',compact(
      'amountToPaystack',
      'convinienceFees',
      'app_no',
      'email',
      'inv',
      'amount_left',
      'amount_paid',
      'amount_due', 'actual_amount',
      'purpose'
      ) );
  }




  public function outstandingPayment(request $request)
  {

    
    $student = $request->app_no;
    $email = $request->email;
    $inv = $request->inv;
    $amount_left =$request->amount_left;
    $amount_paid = $request->amount_paid;
    $amount_due =$request->amount_due;
    $purpose = $request->purpose;
    $amount_to_paystack = ceil((int)$request->amount_to_paystack);
    $actual_amount = $request->actual_amount;

    $transactionRef  = $this->generateTxn();
$getIds = Payment::where('invoice',$inv)->first();
 if($getIds)
   {
    $schedule_id = $getIds->schedule_id;
    $student_id = $getIds->student_id;

   }else {

     $std =  $this->checkMatricno($request->app_no);
      $sch = Payment_schedule::getScheduleByDept($std->department_id,$purpose);
     $schedule_id = $sch->id;
     $student_id = $std->id;



   }
  

    $store = Payment::create([
      'transaction_reference' => $transactionRef,
       'amount' => $actual_amount,
       'invoice' => $inv,
       'amount_due' => $amount_due, 
       'purpose' => $purpose,
       'schedule_id' => $schedule_id,
       'student_id' => $student_id,

    ]);

    $url = "https://api.paystack.co/transaction/initialize";

    $fields = [
      'email' => $email,
      'amount' =>  $amount_to_paystack * 100,
      'reference' => $transactionRef,
      'callback_url' => 'http://localhost:8000/outstanding/payment/callback',
      'metadata' => json_encode([
    
        'receipt_number' => $inv,
       

      ])

    ];
    // dd($fields);

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
    $new = json_decode($result,);

    $payment_url = $new->data->authorization_url;

    return redirect::to($payment_url);
  }



  public function checkoutstandingPaystackTxn(request $request)
  {
    $transactionRef = $request->query('trxref');

    $check = Payment::where('transaction_reference', $transactionRef)->first();
    if ($check->exists()) {

      return $this->verifyoutstandingTxn($transactionRef);

      //  redirect()->route('payment.verify',compact('txnRef'));
    } else
      return redirect('/outstanding/page')->with('message', 'Payment could not be validated');
  }



  public function verifyoutstandingTxn($transactionRef)

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


      $responses = json_decode($response);
     
      $status = $responses->data->status;
      $gatewayRes = $responses->data->gateway_response;
      $signature = $responses->data->authorization->signature;
      $paymentDate = $responses->data->paid_at;
      $reference = $responses->data->reference;
      $invoice = $responses->data->metadata->receipt_number;
      $amount = $responses->data->amount;
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

        return redirect()->route('outstanding.receipts', ['reference' => $transactionRef, 'invoice'=>$invoice]);

      }  else return redirect('/outstanding/page')->with('message','payment could no be verified');

     
  }

}

  public function genoutReceipts(request $request)
  {
    $reference = $request->reference;
    $invoice = $request->invoice;

    // dd($invoice);
    $payment = Payment::with('student', 'schedule')
      ->where('invoice', $invoice)
      ->where('status', 'success')
      ->get();  

    // return $payment;

    // dd($payment);
    $payments = Payment::with('student',)
      ->where('transaction_reference', $reference)
      ->where('status', 'success')
      ->first();
   

    if ($payment) {
      //  $student = $payments->student;
      return view('payments.outstanding-receipts', compact('payment', 'payments'));
    } else return redirect('/outstanding/page')->with('message','payment could no be verified');

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
  public function store(Request $request)
  {
    //
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
}
