<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeTemplateController
{
    public function getComponent(){
        $alerts =[
            [
                "type" => "success",
                "title" => "Success alert",
                "description" => "This is a success alert!"
            ],
            [
                "type" => "danger",
                "title" => "Danger alert",
                "description" => "This is a danger alert!"
            ],
            [
                "type" => "warning",
                "title" => "Warning alert",
                "description" => "This is a warning alert!"
            ]
        ];
        return view('admin.blade-template.component')
        ->with('alerts',  $alerts );
    }
    public function getLocalization(){
        return view('admin.blade-template.localization');
    }
    public function changeLocalization(Request $request){
        $lang = $request->lang;
        session()->put('lang',$lang);
        return redirect('/admin/blade-template/localization');
    }
    
}
