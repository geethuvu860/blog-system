<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }


    function authenticate(Request $request){
        $request->validate([
            'user_name'=>'required',
            'password'=>'required'
        ]);
        // dd($request->all());die;

       $user = User::where('user_name', $request->user_name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            
             
            session([
                'sess_name' => $user->name,
                'session_role' => $user->role_id,
                'logged_id' => $user->id, 
            ]);
            
            
            
             return redirect()->route('dashboard')->with('success','The user already exist');
        } else {
            return redirect()->route('loginIn');
        }
      
        
    }
    function showregister()
    {       $user_roles=User_role::all();
    // $user_roles=
            return view('auth.register',compact('user_roles'));
    }
    function register(Request $request)
    {
            $request->validate([
                'name'=>'required',
                'user_name'=>'required',
                'password'=>'required',
                'email'=>'required',
                'role_id'=>'required',
            ]);
            
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'user_name'=>$request->user_name,
                'password' => Hash::make($request->password),
                'role_id'=>$request->role_id,
            ]);
            return redirect()->route('loginIn')->with('success','Registration Successfull');
    }


    function dashboard(){
       
        return view('dashboard.dashboard');
    }

    function logout(Request $request){
        $request->session()->invalidate();
        return redirect()->route('loginIn');
    }
    
    
}
