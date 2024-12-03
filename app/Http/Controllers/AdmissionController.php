<?php

namespace App\Http\Controllers;

use App\Mail\AdmissionMailNotification;
use App\Models\Student;
use App\Models\Department;
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

    public function getAppnoToHome(Request $request){
        // dd($request->appNo);
        $appNo=$request->appNo;

        return view('home',['appNo'=>$appNo]);

    }

    /**
     * Display the specified resource.
     */
    public function approveStudent($id)
    {
        $students = Student::findorfail($id);
        $status = 1;
        $approve_date = date('F d,Y h:i:s A');
        $students->update(['status' => $status, 'approved_at' => $approve_date]);
        $surname = $students->surname;
        $firstname = $students->firstname;
        $course = $students->department->name;
        $appno = $students->app_no;
         Mail::to($students->email)->send(new AdmissionMailNotification($surname, $firstname, $course, $appno,));
        return redirect()->back()->with('message', 'Applicant Approved Successfully');
    }

    public function rejectStudent($id)
    {
        $students = Student::findorfail($id);
        $status = -1;
        $reject_date = date('F d,Y h:i:s A');
        $students->update(['status' => $status, 'rejected_at' => $reject_date]);
        return redirect()->back()->with('rejectMessage', 'Applicant Rejected Successfully');
    }

    public function show()
    {



         $pendingPromoCourse =    (new \App\Services\ApplicationService())->pendingApplications();

        $pendingStudents= Student::with('department')
        ->where('status', '0')
        ->where('department_id', '!=','null ')
        ->get();
        // dd($pendingStudents);
        $approveStudents = Student::with('department')
        ->where('department_id', '!=','null ')
        ->where('status', 1)->get();
        $rejectedStudents = Student::with('department')
        ->where('department_id', '!=','null ')
        ->where('status', -1)->get();
         return view('admission.admission', compact('pendingPromoCourse','pendingStudents','approveStudents','rejectedStudents'));
    }

    public function admissionSlip(request $request)
    {
        $request = $request->query('app_no');
        //  dd($request);
        $status = 1;
        $current_Date = date('F d,Y h:i:s A');

          $getId=Student::where('app_no', $request)->value('id');
        $checkPaymentStatus = Payment::where('student_id',$getId)
        ->where('status', '=', 'success')
        ->first();
        // dd($checkPaymentStatus);
          $students = Student::with('department')->where('app_no', '=', $request)->where('status', '=', $status)->first();
        //  if ($students == null) {
        //     return  redirect()->back()->with('message', 'Invalid Application Details');
        // } else
        if($checkPaymentStatus !== false){
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
