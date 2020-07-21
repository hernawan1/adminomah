<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{ 
    public function postlogin(Request $request){
    if(Auth::attempt($request->only('email','password'))){
    $level = Auth::user()->level; 
    if($level == 'Admin'){
        return redirect('home');
    }else{
        return redirect('login');
    }   
    }else{
        return redirect('login')->with(['error' => 'Email atau Password Salah']);
    }
}
    public function login(){
        return view('login');
    }
    public function create(Request $request){
        $validator = Validator::make(
            $request->all(),
            array(
                "email" => "unique:users,email"
            )
        );
        if($validator->passes())
            {
            $user= new \App\User;
            $user->level = 'admin';
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            return redirect('/login');
            }
            else
            {
            return redirect('/login')->with(['danger' => 'username sudah terdaftar']);
            }
    }
     use AuthenticatesUsers;

     protected $redirectTo = '/home';
     public function _counstruct(){
        $this->middleware('guest')->except('logout');
     }
     public function logout(){
         Auth::logout();
        return redirect('/login');
     }
}
