<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\department;

use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\CeresenseMail;
use Illuminate\Support\Facades\Mail;








class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function RegistrationPage1(){
       
        return view('student_form1');
    }
    
    public function index()
    {
        $student=Student::all();
        $dept=Department::all();
        $data=['students'=>$student,'depts'=>$dept];
        return view('admin',$data);
        
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
        $validate =   $request->validate([
            'surname' => 'required|string',
            'firstname' => 'required|string',
            'othername' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email|unique:students',
            'next_of_kin' => 'required|string',
            'sponsors' => 'required|string',
            'sponsor_phone' => 'required|string',
        
         ]);

         $validate['password'] = Hash::make($request->input('password'));
      

         $num = rand(10000, 99999); // Generate a random 5-digit number
        $year = date('Y'); // Get the current year
        $appNum = 'APP/'. $num .'/'. $year;

        
     
        $student =  Student::create($validate);
        $student->update(['app_no'=>$appNum]);

        if($student){
            return redirect()->route('register.page2',['id'=>$student->id]);

        }else{
            return redirect()->back()->with('error, student creation failed');

        }

    }
    //  public function RegistrationPage2($id){
    //     $student=Student::findorfail($id);
    //     $depts=Department::all();
    //     $data=['students'=>$student,'depts'=>$depts];
    //     return view('student_form2',$data);


    //  }
    public function registrationPage2($id) {
        $student = Student::findOrFail($id);
        $depts = Department::all();
        return view('student_form2', compact('student', 'depts'));
    }

    public function store2(Request $request, $id){
        $validate =   $request->validate([
                'next_of_kin_phone' => 'required|string',
                'address' => 'required|string',
                'department_id' => 'required|integer|exists:departments,id',
                'class_method' => 'required|in:online,physical',
                'skill_monetization' => 'required|in:yes,no',
                'payment_method' => 'required|in:one-time,installments',
                'hostel' => 'required|in:yes,no',
                'wifi' => 'required|in:yes,no',
                'passport' => 'required|image|max:1024', // Ensure the passport is an image and not too large
                'terms' => 'accepted',
                

             ]);
  
          
           if($request->hasFile('passport')){
            $passport=$request->File('passport');
            $passportName='passport_'.time().''. $passport->getClientOriginalname();
            $passport->move(public_path('upload/'),$passportName);
            $upload='upload/'.$passportName;

            if ($upload){
                $validate['passport']=$passportName;

               }else{
                return redirect()->back()->with('error passport upload failed');
               }

           }
         

           $student=Student::findorfail($id);
           $student->update($validate);
           
        //    return redirect()->route('successPage')->with('success','you have registered successfully')
           return redirect()->route('register.success',['id'=>$student->id]);
          
            
     
    }
    public function Success($id){
        // $student = Student::findorfail($id);
        $student=student::with('department')->findorfail($id);
        $data=['student'=>$student];
        $surname= $student->surname;
        $firstname= $student->firstname;
        $course= $student->department->name;
        $appno=$student->app_no;
        $date=$student->created_at;
        

        Mail::to('testreceiver@gmail.com')->send(new CeresenseMail($surname,$firstname,$course,$appno,$date));
        
        // return 'Mail sent successfully';
        return view('success',$data);
    }
 

    /**
     * 
       
     * Display the specified resource.
     */


// public function ShowApplicationSlip($app)
// {

//     $student=student::with('department')->where('app_no',$app)->firstorfail();
//     return view('application_slip',compact('student'));



// }
public function ShowApplicationSlip(Request $request) {

    $app_no = $request->input('app_no');
    $student=student::with('department')->where('app_no',$app_no)->firstorfail();
    return view('application_slip',compact('student'));

}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestudentRequest $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
