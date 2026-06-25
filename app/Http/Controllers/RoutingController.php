<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController
{
    public function getViewOnly(){
        return view('admin.routing.view-only');
    }
    public function passingDataToView(){
        $buttons = [
            [
               "type" => "primary",
               "text" => "Primary Button"
            ],
            [
                "type" => "secondary",
                "text" => "Secondary Button"
            ],
            [
                "type" => "danger",
                "text" => "Danger Button"
            ],
            [
                "type" => "info",
                "text" => "Info Button"
            ],
        ];

        $alerts = [
            (object)[
               "type" => "primary",
               "text" => "Primary Button"
            ],
            (object)[
                "type" => "secondary",
                "text" => "Secondary Button"
            ],
            (object)[
                "type" => "danger",
                "text" => "Danger Button"
            ],
            (object)[
                "type" => "info",
                "text" => "Info Button"
            ],
        ];

       $listItems =[
           'item1',
           'item2',
           'item3',
        ];

        return view('admin.routing.passing-data-to-view')
            ->with('btns',$buttons)
            ->with('alts',$alerts)
            ->with('listItem', $listItems);
    }
    public function routeParameter($bgColor,$color){
        return view('admin.routing.route-parameter')
        ->with('textColor',$color)
        ->with('boxBackgroundColor', $bgColor);
    }
    public function dynamicRoute(){
        return view('admin.routing.dynamic-route');
    }
    public function submitDynamicRoute(Request $request){
        $boxColor = $request['box-color'];
        $textColor = $request['text-color'];
        // dd( $boxColor, $textColor);
        return redirect('/admin/routing/route-parameter/'.$boxColor.'/'.$textColor);
    }
    public function namedRoute(){
        return view('admin.routing.named-route');
    }
    public function testMiddleware(){
        return view('admin.routing.test-middleware');
    }
    public function postTestMiddleware(Request $request){
       dd('run the controller logic code.');
    }
}
