<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;
use App\Models\Department;
use App\Models\User;


class DepartmentController extends Controller
{

    public function getDepartment($dept){

        $depts=department::find($dept);
        return $depts;
     
        // if ($depts){
        //     return $depts;
        // }else{
        //     return false;
        // }


    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
     
         $depts=Department::with('hod')->get();
         // dd($depts);

      return view('department.view',compact('depts'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate=$request->validate([
           'name' => 'required|string',
           'department_code' => 'required|string',
           'duration' => 'required|string',

        ]);


         $status=1;
        $depts = Department::create($validate);

        return redirect()->back()->with('message','Department Created Successfully');
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
    public function edit(request $request, $id)
    {    $deptId=$request->id;
        
        $validate=$request->validate([
        'name'=>'required|string',
        'department_code'=>'required|string',
        'duration'=>'required|string',

    ]);

    $dept=Department::find($deptId);
    
    $dept->update($validate);

    return redirect()->back()->with('Success','Record Updated Successfully');
        
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
    public function destroy(Request $request, $id)
    {  $dept = $request->id;
        $depts = Department::find($dept);
        $depts->delete();

        return redirect()->back()->with('confirm','Record Deleted Successfully');
        
    }
}
