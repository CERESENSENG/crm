<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('user.view',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
    
         $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'phone' => 'required|string',
         ]);
      
        $validate['password'] = Hash::make($request->input('password'));
    
        $users=User::create($validate);
        // dd($users);
    
        return redirect()->back()->with('message','User Added Successfully');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
         $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string',
            // 'password' => 'required|string'

        ]);


        $userId = $request->id;

        $user=User::find($userId);
        

        $user->update($validate);

        return redirect()->back()->with('status','User Updated Successfully');


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
    public function destroy(Request $request, $id)

    {
        $user = $request->id;
        $users = User::find($user);
        $users->delete();

        return redirect()->back()->with('confirm','User Deleted Successfully');
    }
}
