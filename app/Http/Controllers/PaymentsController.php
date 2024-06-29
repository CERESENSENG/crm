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
        $status='success';
     $payments=Payment::with('student')
     ->where('status',$status) 
     ->get();
     return view('payments.view',compact('payments'));
        
    }
    public function paymentMethod(){
        $arr=['half_payment','full_payment'];
        return $arr;
    }
    public function status(){
        $arr=['success','fail','pending'];
        return $arr;
    }

    public function search()

    {
            $options = $this->paymentMethod();
            $statuses = $this->status();
            return view('payments.search', compact('options','statuses'));

    }

    public function filterPayments(request $request)
    {

        $invoice = $request->invoice;
        $status = $request->status;
        $paymentOption = $request->payment_option;
        $from = $request->from;
        $to = $request->to;


        $null = (   trim($invoice) == '' &&  trim($status) == '' &&  trim($paymentOption) == '' && trim($from) == '' &&  trim($to) == ''  );

        if( empty( $request->all()) ||  $null  )
            $students  = [];
        else if( $invoice){
            $students  =  Payment::whereinvoice($invoice)
            ->get();
        }else if($from && $to){
            $students = Payment:: whereBetween('created_at',[$from,$to])->get();
        }
    
        else
        $students  =  Payment::
         
        when($paymentOption, function ($query) use($paymentOption) {
            return $query->where('payment_option', $paymentOption);
        })->when($status, function ($query) use($status) {
            return $query->where('status', $status);
        })
        
        ->get();
   
        
        $studentList = $students;

         //dd($studentList);
        $options = $this->paymentMethod();
        $statuses = $this->status();

        return view('payments.search', compact('studentList','options','statuses'));

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
        
        $validate=$request->validate([
            ['csv'=>'required|file|mimes:csv,txt|max:50'],
            ['mimes:csv,txt'=>'Only CSV accept']
        
           ]);
        $file=$request->file('csv')->getRealPath();
        
       $paymentRows=$this->readCsvToArray($file);

    //   dd($paymentRows);  
    
    $data=[];
    $k=0;
    $myErr=false;
    $error_in_row=$error_in_csv=false;
     $error=$error_n_studentId=false;
  
    

    foreach($paymentRows as $r){

        $student_id = $r[0];
        $payment_option = $r[1];
        $purpose = $r[2];
        $invoice = $r[3];
        $gateway = $r[4];
        $amount = $r[5];
        $status = $r[6];
        $gateway_reponse = $r[7];
        $payment_date = $r[8];
        $amount_due = $r[9];

         
        $error_in_row=$error_in_csv=false;
        $error=$error_n_studentId=false;

        if( trim( $student_id ) == '' && trim($payment_option) == '' && trim($purpose) == '' &&
          trim($invoice) == '' && trim($gateway) == '' && trim($amount) == '' && trim($status) == '' &&
          trim($gateway_reponse) == '' && trim($payment_date) == '' && trim($amount_due) == ''){

            $error='Error ignored';

        } else  if( trim( $student_id ) == '' || trim($payment_option) == '' || trim($purpose) == '' ||
        trim($invoice) == '' || trim($gateway) == '' || trim($amount) == '' || trim($status) == '' ||
        trim($gateway_reponse) == '' || trim($payment_date) == '' || trim($amount_due) == ''){

            $error_in_csv=true;
            $error_in_row= true;
            $error='One of required field(s) omiited .';
            $myErr=true;

      }else{
        $student=$this->checkStudentId($student_id);

        if(!$student){
            $error_in_csv=true;
            $error_in_row=true;
            $error.='Invalid student id';
            $myErr=true;


        }
        }

        $data[$k]['sn']=$k + 1;
        $data[$k]['student_id']=$student_id;
        $data[$k]['surname']=$student->surname;
        $data[$k]['firstname']=$student->firstname;
        $data[$k]['othername']=$student->othername;
        $data[$k]['payment_option']=$payment_option;
        $data[$k]['purpose']=$purpose;
        $data[$k]['invoice']=$invoice;
        $data[$k]['gateway']=$gateway;
        $data[$k]['amount']=$amount;
        $data[$k]['status']=$status;
        $data[$k]['gateway_response']=$gateway_reponse;
        $data[$k]['payment_date']=$payment_date;
        $data[$k]['amount_due'] = $amount_due;

        $data[$k]['error']=$error;
        $data[$k]['error_in_studentId']= $error=$error_n_studentId=false;
        
        if($error)
            $data[$k]['comment'] = $error;
       else if($error_in_row)
           $data[$k]['comment'] = $error;
        else
            $data[$k]['comment'] = 'ok';
        $k++;


        $result = json_decode(json_encode($data));
    }
    $result = json_decode(json_encode($data));

    return view('payments.confirm',['confirms' => $result, 'CSV_ERR' => $myErr]);

    }

    public function storePayments(request $request)
    {
        $validate=$request->validate([
            'data' => 'required'

        ],
        [ 'required'=>':attribute is required.' ] );

        foreach($validate['data'] as $rowStd){
            
            $txn=$this->generateTxn();
            $tudent=Payment::create([
                'student_id'=>$rowStd['student_id'],
                'transaction_reference' => $txn,
                'payment_option'=>$rowStd['payment_option'],
                'invoice'=>$rowStd['invoice'],
                'gateway'=>$rowStd['gateway'],
                'amount'=>$rowStd['amount'],
                'amount_due' => $rowStd['amount_due'],
                'status'=>$rowStd['status'],
                'gateway_response'=>$rowStd['gateway_response'],
                'payment_date'=>$rowStd['payment_date'],
            
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
      
        $getStd = student::with('payment')->where('app_no', $appNo)->first();
       



        if($getStd == Null )
        {
            return redirect()->back()->with('message', 'No Record Found');   
        }
        $getId=$getStd->id;
        $idExists = Payment::where('student_id', $getId)->doesntexist();
        if($idExists)
        {
           return redirect()->back()->with('message', 'No Record Found');  
        }

        if($getStd->status <= 0)
        {
            return redirect()->back()->with('status', 'You have not been offered admission yet');
        }

        $student_id = $getStd->id;
        $email = $getStd->email;
        $app_no = $getStd->app_no;
        $deptId = $getStd->department_id;
        // $txn = $this->generateTxn();
           
          $fail = 0; 
          $pending = 'pending';
          $amount_due = 0;

        foreach($getStd->payment as $std)
        {
            $chkStatus = $std->status;
            $amountDue = $std->amount_due;
            $amountPaidBefore = $std->amount;
            $inv = $std->invoice;
        


        }
        
        if(!empty($chkStatus)  && $chkStatus !== $fail && $chkStatus !== $pending &&
           !empty($amountDue) && $amountDue <= $amount_due  )
        {
            // return redirect()->back()->with('success', 'You have no outstanding payment');
              $payment = payment::with('student')->where('invoice', $inv)->get();
            //   dd($invoice); 

            $payments = Payment::with('student')
            ->where('status', 'success')
            ->where('gateway_response', 'successful')->first();

        

            return view('payments.outstanding-receipts', compact('payment', 'payments'));

        } 
        if(empty($chkStatus)  || $chkStatus == $fail || $chkStatus == $pending &&
          empty($amountDue) == false || $amountDue > $amount_due)
        {
            return  view('payments.outstandingCart' ,compact(
                          'amountDue','student_id', 'email', 'app_no',
                            'inv','deptId','amountPaidBefore')); 
        }
    
      

    }

    public function outstandingPayment(request $request)
    {

        $studentId = $request->student_id;
        $student = $request->app_no;
        $email = $request->email;
        $inv = $request->inv;
        // $transactionRef = $request->txn;
        $deptId=$request->department_id;
        $amount_due = $request->amount_due;
        $amount_paid_before = $request->amount_paid_before;
        $amount_to_pay = $request->amount_to_pay;


        // $checkSchedule = Payment_schedule::where('department_id', $deptId)->find($deptId);
        // $totalAmount = $checkSchedule->amount;

        

        // $sum = ($amount_paid_before + $amount_to_pay);
        // $amountDue = ($totalAmount - $sum ); 

        // dd($amountDue);

        $transactionRef  = $this->generateTxn();

        $store = Payment::create([
            'transaction_reference' => $transactionRef,
            'student_id' => $studentId,
            'amount' => $amount_to_pay,
            'invoice' => $inv,
            // 'amount_due' => $amount_due,
         
        ]);

        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
          'email' => $email,
          'amount' =>  $amount_to_pay * 100,
          'reference' => $transactionRef,
          'callback_url' => 'http://localhost:8000/outstanding/payment/callback',
          'metadata' => json_encode([
            'student_id' => $student,
            'receipt_number' => $inv,
            'deptId' => $deptId,
            'amount_due' => $amount_due,
            'amount_paid_before' => $amount_paid_before,
         
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
   
         $payment_url =$new->data->authorization_url;

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
        return redirect()->back()->with('message', 'Payment could not be validated');
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
        //   dd($responses);
          $status = $responses->data->status;
          $gatewayRes = $responses->data->gateway_response;
          $signature = $responses->data->authorization->signature;
          $paymentDate = $responses->data->paid_at;
          $formatDate= date('Y-m-d', strtotime($paymentDate));
          $reference = $responses->data->reference;
          $invoice = $responses->data->metadata->receipt_number;
          $amount = $responses->data->amount;
          $deptId =  $responses->data->metadata->deptId;
          $amount_due = $responses->data->metadata->amount_due;
          $amount_paid_before = $responses->data->metadata->amount_paid_before;
          $amountInNaira = ($amount / 100);

          $checkSchedule = Payment_schedule::where('department_id', $deptId)->find($deptId);
        $totalAmount = $checkSchedule->amount;

        

        $sum = ($amount_paid_before + $amountInNaira);
        $amountDue = ($totalAmount - $sum ); 

        // dd($amountDue)
        //   dd($invoice);

          $getId = Payment::where('transaction_reference', $transactionRef)->value('id');

          $storeTransaction = [
            'amount' => $amountInNaira,
            'transaction_reference' => $reference,
            'status' => $status,
            'gateway_response' => $gatewayRes,
            'signature' => $signature,
            'payment_date' => $formatDate,
            'amount_due' => $amountDue,
          
          ];

          $payment = payment::with('students')->where('id', $getId)->update($storeTransaction);
      
          $getInvoice = payment::where('invoice',$invoice )->get();
        //   dd($getInvoice);
          if ($payment == true) {
            return redirect()->route('outstanding.receipts', compact('invoice'));
          } else return redirect()->back()->with('unable to save', 'transaction could not be completed');


        }



    }

    public function genoutReceipts(request $request)
    {
      $reference = $request->reference;
       $invoice = $request->invoice;
  
      // dd($invoice);
      $payment = Payment::with('student')
        ->where('invoice', $invoice)
        ->where('status', 'success')
        ->where('gateway_response', 'successful')->get();

        // dd($payment);
        $payments = Payment::with('student')
        ->where('transaction_reference', $reference)
        ->where('status', 'success')
        ->where('gateway_response', 'successful')->first();
        // dd($payments);

  
      // $getInvoice = payment::where('invoice',$invoice )->get(); 
        
      if ($payment ) {
        //  $student = $payments->student;
        return view('payments.outstanding-receipts', compact('payment', 'payments'));
      } 
      
      else return view('error');
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
