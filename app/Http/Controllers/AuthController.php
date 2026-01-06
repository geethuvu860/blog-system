<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    function dashboard(){
        // dd('hello');die;
        return view('dashboard.dashboard');
    }

    function logout(Request $request){
        $request->session()->invalidate();
        return redirect()->route('loginIn');
    }
}
