<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class FeatureBController
{
    function getUserName(){
        //first edited function
    }
    function getItems(){
        $data = Item::get();
        return response()->json($data,200);
    }
}
