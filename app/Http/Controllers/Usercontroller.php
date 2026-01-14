<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_role;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    function list(){
        
        $users=User::where('role_id',2)->get();
        return view('users.list',compact('users'));
    }

    function create(){
        return view('users.create');
    }  
     

    function store(Request $request){
        $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:6'
       ]);
       $name=$request->name; 
       $email=$request->email;
       $password=$request->password;
       
       $condi=array(
        'email'=>$email
    );
       $user_row=User::where($condi)->first();
       if(!empty($user_row)){
         return redirect()->route('register') ->with('error', 'Email already exists!.');;
       }
       else{
        $field=array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
         );
         User::create($field);
        return redirect()->route('users.list')->with('success','User created successfully.');
       }
    }   
    //edit the registration form 
    function edit($user_id)
    {
   
        $user = User::with('role')->findOrFail($user_id);
        $user_roles = User_role::all();
        return view('users.edit',compact('user','user_roles'));  
    }   
    //update the registration form
    function update(Request $request, $user_id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'user_name'=>'required|string|max:255',
            'email'=>'required|email',
            'role_id'=>'required'
        ]);
        $user=User::findorfail($user_id);
        $user->update([
        'name' => $request->name,
        'user_name' => $request->name,
        'email' => $request->email,
        'role_id' => $request->role_id,
    ]);
        return redirect()->route('users.list')->with('success','User updated successfully.');
    }
    //delete the users
    function delete($user_id)
    {
        User::where('user_id', $user_id)->delete();
        return redirect()->route('users.list')->with('success','User deleted successfully.');
    }   
}
