<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarterController
{
    public function getPage1(){
        return view('admin.starter.page1');
    }
    public function getPage2(){
        return view('admin.starter.page2');
    }
    public function getPage3(){
        return view('admin.starter.page3');
    }
    public function getPage4(){
        return view('admin.starter.page4');
    }
    public function getPage5(){
        return view('admin.starter.page5');
    }
    public function getApp(){
        return view('admin.layouts.app');
    }
}
