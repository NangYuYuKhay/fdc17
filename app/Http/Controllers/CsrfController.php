<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsrfController
{
    public function lecture1(){
        return view('admin.csrf.lecture1');
    }
    public function lecture2(){
        return view('admin.csrf.lecture2');
    }
    public function lecture3(){
        return view('admin.csrf.lecture3');
    }
    public function create(Request $request){
        $name = $request->name ;
        $age = $request->age;
        dd($name,$age);
    }
    public function getItems(){
        $randomNumber = rand(0,10);
        $items = [];
        for ($i=1; $i <= $randomNumber ; $i++) { 
            array_push($items,'item' .$i);
        }
        return response()->json($items); 
    }
}
