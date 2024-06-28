<?php

namespace App\Http\Controllers;
use App\Models\student;
use App\Models\Payment;

use Illuminate\Http\Request;

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
