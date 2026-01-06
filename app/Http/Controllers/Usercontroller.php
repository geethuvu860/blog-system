<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    function list(){
        $condi=array('role_id'=>2);
        $record=User::where();
        $data['records']=$record;
        $data['title']='User List';
        return view('users.list', $data);
    }//func

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

    function edit($id){
        $data['user']=User::where('user_id', $id)->first();
        return view('users.edit', $data);
    }   

    function update(Request $request, $id){
        
        return redirect()->route('users.list')->with('success','User updated successfully.');
    }

    function delete($id){
        User::where('user_id', $id)->delete();
        return redirect()->route('users.list')->with('success','User deleted successfully.');
    }   
}
