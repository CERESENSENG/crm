<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;


use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\ApplicationMailNotification;
use Illuminate\Support\Facades\Mail;








class StudentController extends Controller
{



    //  COMMENT:   Dashboard shoould display the analytical tools  such as metrics, charts: you can leave this page to display only welcome to Ceresense CRM Dashboard for now
    //  pending d time we will work on it.
    // Also,  clean up the template: you need to display only menu needed in the template and remove d  others.
    /****
     * Menus:  Dasboard
     *          Students main menu: sub-menu: seach, view, enrol
     *        Admission: 
     *        Payment Main menu: sub-menu:  schedule, manage, upload       */


    public function index()
    {
        $student = Student::all();
        $dept = Department::all();
        $data = ['students' => $student, 'depts' => $dept];
        return view('admin', $data);
    }

    /**
     * Display a listing of the resource.
     */
    public function applicationRegister_Stage1()
    {

        return view('application.stage-1');
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
    public function applicationStore_Stage1(Request $request)
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


        // COMMENT: you need to add column to store year of admission: admission_year

        $validate['password'] = Hash::make($request->input('password'));


        // COMMENT: more code added to make it more unique
        // $num = rand(10000, 99999); // Generate a random 5-digit number
        // $uniq = substr(hexdec(uniqid()), -4);
        // $num =   strval(rand(1000, 9999));   // Generate a random 4-digit number
        // $str =  str_shuffle($num . $uniq);
        //  str_shuffle($str);

        $year = date('Y'); // Get the current year
        // $appNum = 'APP/' . $year . '/' . $str;

        $appNum = Student::genAppNo($year);


       // $cohort = Setting::where('item', 'cohort')->value('value');
        $cohort  =  app('settings')['cohort'];

        $student =  Student::create($validate);
        $student->update(['app_no' => $appNum, 'admission_year' => $year, 'matric_no' => $appNum, 'cohort' => $cohort]);

        if ($student) {
            return redirect()->route('register.stage-2', ['id' => $student->id]);
        } else {
            return redirect()->back()->with('error, student creation failed');
        }
    }

    public function applicationRegister_Stage2($id)
    {
        $student = Student::findOrFail($id);
        $depts = Department::all();
        return view('application.stage-2', compact('student', 'depts'));
    }

    public function applicationStore_Stage2(Request $request, $id)
    {
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


        if ($request->hasFile('passport')) {

            $passport = $request->File('passport');    // leave a  space for   variable asssignmnet
            $rad =  mt_rand(1000, 9999);

            //  $passportName ='passport_'.time().''. $passport->getClientOriginalname();
            //  let hash the possport name to avoid name collision      
            $passportName =  md5($passport->getClientOriginalName()) . mt_rand(000, 999) . '.' . $passport->getClientOriginalExtension();


            $passport->move(public_path('upload/'), $passportName);
            $upload = 'upload/' . $passportName;

            if ($upload) {
                $validate['passport'] = $passportName;
            } else {
                return redirect()->back()->with('error passport upload failed');
            }
        }


        $student = Student::findorfail($id);
        $student->update($validate);

        //    return redirect()->route('successPage')->with('success','you have registered successfully')
        return redirect()->route('register.message', ['id' => $student->id]);
    }
    public function applicationMessage($id)
    {
        // $student = Student::findorfail($id);
        $student = Student::with('department')->findorfail($id);
        $data = ['student' => $student];
        $surname = $student->surname;
        $firstname = $student->firstname;
        $course = $student->department->name;
        $appno = $student->app_no;
        $date = $student->created_at;


        //  COMMENT:  You are just copy and paste the code witout editi it  properly, You need to pass the email address of the student not static email address
        //Mail::to('testreceiver@gmail.com')->send(new CeresenseMail($surname,$firstname,$course,$appno,$date));

        // CHange the name of CeresenseMail  to ApplicationMailNotification

        Mail::to($student->email)->send(new ApplicationMailNotification($surname, $firstname, $course, $appno, $date));

        // return 'Mail sent successfully';
        return view('application.message', $data);
    }


    /**
     * 
       
     * Display the specified resource.
     */

    public function ShowApplicationSlip(Request $request)
    {

        $app_no = $request->input('app_no');
        $student = Student::with('department')->where('app_no', $app_no)->firstorfail();
        return view('application.slip', compact('student'));
    }


    public function showApplicantFullDetails(request $request)
    {
        $appNo = $request->input('app_no');
        $student = Student::with('department')->where('app_no', $appNo)->firstorfail();
        return view('application.applicant_details', compact('student'));
    }


    public function searchStudent(Request $request)
    {


        //  dd(3);

        $depts = Department::all();
        $cohorts = $this->getCohorts();
        $years = $this->getYear();

        $matric = $request->app_no;
        $dept = $request->department_id;
        $year = $request->admission_year;
        $cohort = $request->cohort;
        // dd($cohort);

        $status = 1;


        //   dd(empty($request->all())? 2 : 1  );
        $null = (trim($cohort) == '' &&  trim($matric) == '' &&  trim($dept) == '' && trim($year) == '');

        if (empty($request->all()) ||  $null)
            $students  = [];
        else if ($matric) {
            $students  =  Student::whereMatricNo($matric)
                ->where('status', '>', 0)
                ->get();
        } else
            $students  =  Student::when($dept, function ($query) use ($dept) {
                    return $query->where('department_id', $dept);
                })
                ->when($cohort, function ($query) use ($cohort) {
                    return $query->where('cohort', $cohort);
                })
                ->where('status', '>', 0)
                ->get();

        $studentList = $students;

        return view('student.search', compact('studentList', 'depts', 'cohorts', 'years'));
    }

    public function enroll()
    {
        return view('student.enrollment');
    }

    public function view()
    {
        $status = 1;
        $students = Student::with('department')->where('status', $status)->get();

        return view('student.view', compact('students'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $request)
    {
        $id = $request->id;
        $student = Student::with('department')->where('id', $id)->first();


        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, $id)
    {
        $validate = $request->validate([
            'surname' => 'required|string',
            'firstname' => 'required|string',
            'othername' => 'required|string',
            'phone' => 'required|string',
            // 'password' => 'required|string',
            // 'email' => 'required|email|unique:students',
            'next_of_kin' => 'required|string',
            'sponsors' => 'required|string',
            'sponsor_phone' => 'required|string',

        ]);
        // $validate['password'] = Hash::make($request->input('password'));

        $student = Student::findorfail($id);

        $student->update($validate);

        return redirect()->route('student.edit2', ['id' => $student->id]);
    }

    public function editStage(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();
        $depts = Department::all();

        return view('student.edit2', compact('student', 'depts'));
    }
    public function updateStage(request $request, $id)
    {
        $validate = $request->validate([
            'next_of_kin_phone' => 'required|string',
            'address' => 'required|string',
            // 'department_id' => 'required|integer|exists:departments,id',
            'class_method' => 'required|in:online,physical',
            'skill_monetization' => 'required|in:yes,no',
            'payment_method' => 'required|in:one-time,installments',
            'hostel' => 'required|in:yes,no',
            'wifi' => 'required|in:yes,no',
            'passport' => 'required|image|max:1024', // Ensure the passport is an image and not too large
            'terms' => 'accepted',

        ]);


        if ($request->hasFile('passport')) {

            $passport = $request->File('passport');    // leave a  space for   variable asssignmnet
            $rad =  mt_rand(1000, 9999);

            //  $passportName ='passport_'.time().''. $passport->getClientOriginalname();
            //  let hash the possport name to avoid name collision      
            $passportName =  md5($passport->getClientOriginalName()) . mt_rand(000, 999) . '.' . $passport->getClientOriginalExtension();


            $passport->move(public_path('upload/'), $passportName);
            $upload = 'upload/' . $passportName;

            if ($upload) {
                $validate['passport'] = $passportName;
            } else {
                return redirect()->back()->with('error passport upload failed');
            }
        }


        $student = Student::findorfail($id);
        $student->update($validate);

        return redirect()->route('student.view')->with('success', 'Record updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $student = $request->input('student_id');
        $delStudent = Student::find($student);
        $delStudent->delete();
        return redirect()->back()->with('success', 'Student Data Deleted Successfully');
    }

    public function checkAppno($appNo)
    {
        //  dd($appNo);
        $students = Student::where('app_no', $appNo)->first();
        // dd($students);
        return $students;
     
    }


    public function upload(Request $request)
    {


        $validate = $request->validate([
            ['csv' => 'required|file|mimes:csv,txt|max:50'],
            ['mimes:csv,txt' => 'Only CSV accept']

        ]);
        $file = $request->file('csv')->getRealPath();
        $studentRows = $this->readCsvToArray($file);
        //    dd($studentRows);
        $data = [];
        $k = 0;
        $myErr = false;
        $error_in_row = $error_in_csv = false;
        $error = $error_n_email = false;

       // $error = $error_n_appNo = false;
       $check = [];
        
       
        foreach ($studentRows as $r) {
            $surname = ucfirst(strtolower($r[0]));
            $firstname = ucfirst(strtolower($r[1]));
            $othername = ucfirst(strtolower($r[2]));
           // $appNo = $r[3];
           // $matricNo = $r[4];
            $admission_year = $r[3];
            $cohort = $r[4];
            $status = $r[5];
            $department_id = $r[6];
            $classMethod = $r[7];
            $next_of_kin = $r[8];
            $next_of_kin_phone = $r[9];
            $email = $r[10];
            $phone = $r[11];
            $sponsors = $r[12];
            $address = $r[13];
            $terms = $r[14];
            $sponsorsPhone = $r[15];
            $wifi = $r[16];
            $hostel = $r[17];
            $skillMonetization = $r[18];
            $paymentMethod = $r[19];


            $error_in_row = $error_in_csv = false;
            $error = $error_n_appNo = false;
            $error = $error_n_email = false;
          

            if (
                trim($surname) == '' && trim($firstname) == '' && trim($othername) == ''
               // && trim($appNo) == '' && trim($matricNo) == '' 
                && trim($admission_year) == ''
                && trim($cohort) == '' && trim($status) == '' && trim($department_id) == ''
                && trim($classMethod) == '' && trim($next_of_kin) == '' && trim($next_of_kin_phone) == ''
                && trim($email) == '' &&  trim($phone) == '' && trim($sponsors) == '' && trim($address) == ''
                && trim($terms) == '' && trim($sponsorsPhone) == '' && trim($wifi) == '' && trim($hostel) == ''
                && trim($skillMonetization) == '' && trim($paymentMethod) == ''
            ) {
 
                $error = 'one of the CSV column is empty';
    
                

            } else if (
                trim($surname) == '' || trim($firstname) == '' || trim($othername) == '' ||
                
                // trim($appNo) == '' || trim($matricNo) == '' ||
                  trim($admission_year) == '' ||
                 trim($cohort) == '' || trim($status) == '' || trim($department_id) == '' ||
                 trim($classMethod) == '' || trim($next_of_kin) == '' || trim($next_of_kin_phone) == ''
             || trim($email) == '' ||  trim($phone) == '' || trim($sponsors) == '' || trim($address) == ''
                || trim($terms) == '' || trim($sponsorsPhone) == '' || trim($wifi) == '' || trim($hostel) == ''
            || trim($skillMonetization) == '' || trim($paymentMethod) == ''
            ) 
            {

                $error_in_csv = true;
                $error_in_row = true;
                $error = 'One of required field(s) omiited .';
                $myErr = true;

                // return $error;
            } 
                $dpmt = new DepartmentController();

                $dept = $dpmt->getDepartment($department_id);

                // dd($dept);
                $appNo = Student::genAppNo($admission_year);

                $chkappNo = $this->checkAppno($appNo);
            
                // if ($chkappNo) {
                //     $error_in_csv = true;
                //     $error_in_row = true;
                //     $error_n_appNo = true;
                //     $myErr = true;
                //     $chkappNo = '';
                //     $error .= ($error) ? ' matric no already exists' : 'matric no already exists';
                // }else{
                //     $error_in_csv = false;
                //     $error_in_row = false;
                //     $error_n_appNo = false;
                //     $myErr = false;
                //     $appNo =$appNo;

                // }

               if($dept){
  
                $deptName = $dept->name;
                $deptId = $dept->id;
            

               }else{
                $error_in_csv = true;
                 $error_in_row = true;
                 $error .=  ($error) ? ' and Invalid department id' : ' Invalid department id  ';
                 $myErr = true;
                 $deptName = '';
                 $deptId = $department_id;

               }

               $chkEmail = Student::checkEmail($email);

               if($chkEmail){

                $error_in_csv = true;
                $error_in_row = true;
                $error .=  ($error) ? 'Email address already exists' : ' Email address already exists';
                $myErr = true;

               }

               if (in_array($email, $check)) {
                $error_in_csv = true;
                $error_in_row = true;
                $error_n_email = true;
                $error .= ($error) ? 'duplicate email address  ' : 'duplicate email address';
                $myErr = true;
            }
   
    
            $data[$k]['sn'] = $k + 1;
            $data[$k]['surname'] = $surname;
            $data[$k]['firstname'] = $firstname;
            $data[$k]['othername'] = $othername;
            $data[$k]['appNo'] = $appNo;
            $data[$k]['matricNo'] = $appNo;
            $data[$k]['admission_year'] = $admission_year;
            $data[$k]['cohort'] = $cohort;
            $data[$k]['status'] = $status;
             $data[$k]['deptName'] = $deptName;
            $data[$k]['deptId'] = $deptId;
            $data[$k]['classMethod'] = $classMethod;
            $data[$k]['next_of_kin'] = $next_of_kin;
            $data[$k]['next_of_kin_phone'] = $next_of_kin_phone;
            $data[$k]['email'] = $email;
            $data[$k]['phone'] = $phone;
            $data[$k]['sponsors'] = $sponsors;
            $data[$k]['address'] = $address;
            $data[$k]['terms'] = $terms;
            $data[$k]['sponsorsPhone'] = $sponsorsPhone;
            $data[$k]['wifi'] = $wifi;
            $data[$k]['hostel'] = $hostel;
            $data[$k]['skillMonetization'] = $skillMonetization;
            $data[$k]['paymentMethod'] = $paymentMethod;
            
            $data[$k]['error'] = $error;
            $data[$k]['error_in_appNo'] = $error_n_appNo;
          
            if ($error)
                $data[$k]['comment'] = $error;
            elseif ($error_in_row)
                $data[$k]['comment'] = $error;
            else
                $data[$k]['comment'] = 'ok';

            array_push($check, $email);

            $k++;


            $result = json_decode(json_encode($data));
        }

        $result =  json_decode(json_encode($data));

    //    dd($myErr);

        return view('student.confirm', ['confirms' => $result, 'CSV_ERR' => $myErr]);
    }


    public function studentEnroll(Request $request)
    {
        $validate = $request->validate(
            [
                'data' => 'required'

            ],
            ['required' => ':attribute is required.']
        );

        foreach ($validate['data'] as $rowStd) {
            $tudent = Student::create([
                'surname' => $rowStd['surname'],
                'firstname' => $rowStd['firstname'],
                'othername' => $rowStd['othername'],
                'app_no' => $rowStd['appNo'],
                'matric_no' => $rowStd['matricNo'],
                'admission_year' => $rowStd['surname'],
                'cohort' => $rowStd['cohort'],
                'status' => $rowStd['status'],
                'department_id' => $rowStd['dept_id'],
                'class_method' => $rowStd['classMethod'],
                'next_of_kin' => $rowStd['next_of_kin'],
                'next_of_kin_phone' => $rowStd['next_of_kin_phone'],
                'email' => $rowStd['email'],
                'phone' => $rowStd['phone'],
                'sponsors' => $rowStd['sponsors'],
                'address' => $rowStd['address'],
                'terms' => $rowStd['terms'],
                'sponsor_phone' => $rowStd['sponsorsPhone'],
                'wifi' => $rowStd['wifi'],
                'hostel' => $rowStd['hostel'],
                'skill_monetization' => $rowStd['skillMonetization'],
                'payment_method' => $rowStd['paymentMethod'],
            ]);
        }

        return redirect()->route('student.enroll')->with('success', 'Data stored successfully!');
    }

    public function certificateUploadPage()
    {

        return view('certificate.upload');
    }

    public function showCertificate(){

      $students = Student::with('department')->where('department_id', '!=', 'null')->get();
    
      return view('certificate.view',compact('students',));
    }

    public function editCertificate(Request $request ,$student_id){

         $validate = $request->validate([
            'certificate_no' =>'required|string'
         ]);

      $std = Student::find($student_id);
      $update = $std->update($validate);

      if ($update){

        return redirect()->back()->with('success', 'Student certificate updated successfully');
      }else {
        return redirect()->back()->with('error','Error encountered');
      }

    }

    public function searchCertificate(request $request){

        $matric_no = $request->matric_no;
        $year = $request->year;
        $certificate_no = $request->certificate_no;

        $null = (trim($matric_no) == '' && trim($year) == '' && trim($certificate_no) == '');

        if (empty($request->all()) || $null ){
             $students = [];
        } else if ($matric_no){

         $students = Student::with('department')
                             ->where('department_id', '!=', 'null')
                             ->where('matric_no',$matric_no)->get(); 
        } else{

            $students  =  Student::with('department')->where('department_id', '!=', 'null')
                                                    ->when($year, function ($query) use ($year) {
                                                      return $query->where('admission_year', $year);
              })->when($certificate_no, function ($query) use ($certificate_no) {
                return $query->where('certificate_no', $certificate_no);
              })
      
             ->get();
        }  

    

        $studentCert = $students;

        return view('certificate.search',compact('studentCert'));


    }


    public function certificateUpload(request $request)
    {

        $validate = $request->validate([
            ['csv' => 'required|file|mimes:csv,txt|max:50'],
            ['mimes:csv,txt' => 'Only CSV accept']

        ]);
        $file = $request->file('csv')->getRealPath();
        $certificateRows = $this->readCsvToArray($file);

        //    dd($certificateRows);

        $data = [];
        $k = 0;
        $myErr = false;
        $error_in_row = $error_in_csv = false;
        $error = $error_n_matric = false;
        $error_n_certificate = false;

        $check = [];
        foreach ($certificateRows as $r) {

            $matric_no = $r[0];
            $certificate_id = $r[1];

            $error_in_row = $error_in_csv = false;
            $error = $error_n_matric = false;
            $error = $error_n_certificate = false;

            if (trim($matric_no) == ''  && trim($certificate_id) == '') {

                $error = 'One of the CSV column is empty!!';
            } else if (trim($matric_no) == '' || trim($certificate_id) == '') {

                $error_in_csv = true;
                $error_in_row = true;
                $error = 'One of required field(s) omiited .';
                $myErr = true;
            } 

                $student = $this->checkMatricno($matric_no);
                $certificate = $this->checkCertificate($certificate_id);
               
                if ($certificate) {
                    $existingCert = $certificate->certificate_no;
                    $error_in_csv = true;
                    $error_in_row = true;
                    $error .= ($error) ? 'certificate Id already exist ' : 'certificate Id already exist';
                    $myErr = True;
                    $error_n_certificate = true;
                    $certificate_id = $existingCert;
                } else{

                    $certificate_id =$certificate_id;
                  
                }

                if (!$student) {
                    $error_in_csv = true;
                    $error_in_row = true;
                    $error_n_matric = true;
                    $error .= ($error) ? 'and matric does not exists ' : 'matric does not exists';
                    $myErr = true;
                    $student_name = '';
                    $student_id = '';
                } else {

                    $student_name = $student->firstname . ' ' . $student->surname;
                    $student_id = $student->id;
                }

                if (in_array($certificate_id, $check)) {
                    $error_in_csv = true;
                    $error_in_row = true;
                    $error_n_certificate = true;
                    $error .= ($error) ? 'duplicate certificate Id  ' : 'duplicate certificate Id';
                    $myErr = true;
                }

              
            

            $data[$k]['sn'] = $k + 1;
            $data[$k]['student_name'] = $student_name;
            $data[$k]['student_id'] = $student_id;
            $data[$k]['matric_no'] = $matric_no;
            $data[$k]['certificate_id'] = $certificate_id;
            $data[$k]['error'] = $error;
            $data[$k]['error_in_matric'] = $error_n_matric;
            $data[$k]['error_in_certificate'] = $error_n_certificate;

            if ($error)
                $data[$k]['comment'] = $error;
            else if ($error_in_row)
                $data[$k]['comment'] = $error;
            else
                $data[$k]['comment'] = 'ok';
            $k++;

            array_push($check, $certificate_id);
        }

        $result = json_decode(json_encode($data));


        return view('certificate.confirm', ['confirms' => $result, 'CSV_ERR' => $myErr]);
    }



    public function certificateStore(request $request)   
    {

        $validate = $request->validate(
            [
                'data' => 'required'

            ],
            ['required' => ':attribute is required.']
        );
   
        foreach ($validate['data'] as $rowStd) {
            $student = Student::where('id', $rowStd['student_id'])->first();
            if ($student) {
                $student->update(['certificate_no' => $rowStd['certificate_id']]);
            }
        }

        return redirect()->route('page.certificate')->with('success', 'Data stored successfully!');
         
    }


    public function verifyCert(request $request){

     $certificate = $request->certificate_no;

     $student = Student::where('certificate_no', $certificate)->first();

     if(!$student){
        return redirect()->back()->with('message', 'No record Found');

     }else{

        return view('student.certificate',compact('student'));
     }



    }






}
