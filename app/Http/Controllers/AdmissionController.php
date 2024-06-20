<?php

namespace App\Http\Controllers;

use App\Mail\admissionMailNotification;
use App\Models\student;
use App\Models\department;
use App\Models\Payment;
use App\Mail\ApplicationMailNotification;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function approveStudent($id)
    {
        $students = student::findorfail($id);
        $status = 1;
        $approve_date = date('F d,Y h:i:s A');
        $students->update(['status' => $status, 'approved_at' => $approve_date]);
        $surname = $students->surname;
        $firstname = $students->firstname;
        $course = $students->department->name;
        $appno = $students->app_no;
        // Mail::to($students->email)->send(new admissionMailNotification($surname, $firstname, $course, $appno,));
        return redirect()->back()->with('message', 'Applicant Approved Successfully');
    }

    public function rejectStudent($id)
    {
        $students = student::findorfail($id);
        $status = -1;
        $reject_date = date('F d,Y h:i:s A');
        $students->update(['status' => $status, 'rejected_at' => $reject_date]);
        return redirect()->back()->with('rejectMessage', 'Applicant Rejected Successfully');
    }
    
    public function show()
    {
        //   $departments=Department::all();
        $students = Student::with('department')->where('status', '0')->get();
        // dd($students);
        return view('admission.pending_page', compact('students'));
    }
    public function showApproveStudent()
    {

        $students = student::with('department')->where('status', 1)->get();
        return view('admission.approve_page', compact('students'));
    }
    public function showRejectStudent()
    {

        $students = student::with('department')->where('status', -1)->get();
        return view('admission.reject_page', compact('students'));
    }
    public function admissionSlip(request $request)
    {
        $request = $request->input('app_no');
        $status = 1;
        $current_Date = date('F d,Y h:i:s A');

         $getId=student::where('app_no', $request)->value('id');
        $checkPaymentStatus = payment::where('student_id',$getId)
        ->where('status', '=', 'success')
        ->first();
         $students = student::with('department')->where('app_no', '=', $request)->where('status', '=', $status)->first();
         if ($students == null) {
            return  redirect()->back()->with('message', 'Invalid Application Details');
        } elseif($checkPaymentStatus !==null){
            return view('admission.letter', compact('students', 'current_Date'));

        }
        else  {return  redirect()->back()->with('message','you have not make payment');
            
        }
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
