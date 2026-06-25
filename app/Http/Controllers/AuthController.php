<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController
{
    public function getLogIn(){
        return view('admin.auth.login');
    }
    public function Login(Request $request){
       $validator = validator::make(
        $request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]
        );

        if($validator->fails()){
            return redirect('/admin')
            ->withErrors($validator)
            ->withInput();
        }

        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            return redirect('/admin/page1');
        }else{
            $validator->errors()->add('password','Your credential is incorrect.');
            return redirect('/admin')
            ->withErrors($validator)
            ->withInput();
        }
    }
    public function Logout(){
        Auth::logout();
        return redirect('/admin');
    }
}