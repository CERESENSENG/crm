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
    // $depts=Department::find(1);
         $depts=Department::with('user')->get();
         dd($depts);
      
             return view('department.view',compact('depts'));
        
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
    public function edit(request $request, $id)
    {
        dd($id);
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
