<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController
{
    public function lecture(){
        return view('admin.session.lecture');
    }
    public function put(Request $request){
        session()->put('name',$request->name);
        session()->put('age',$request->age);
        session()->put('address',$request->address);

        return redirect('/admin/session/lecture');
    }
    public function delete($key){
        if($key == 'delete-all'){
            session()->flush();
        }else{
            session()->forget($key);
        }
        return redirect('/admin/session/lecture');
    }
    public function index(){
        $tasks = session()->has('tasks')? session()->get('tasks'):[];
        return view('admin.session.index')
        ->with('tasks',$tasks);
    }
    public function store(Request $response){
        //get tasks from session
      $tasks = session()->has('tasks')? session()->get('tasks'):[];

      $task = [];
      $task['id'] = uniqid();
      $task['task'] = $response->task ;
      $task['description'] = $response->description;

      array_push($tasks,$task);

      //Save updated tasks back to session
      session()->put('tasks',$tasks);

    // session()->flush();

      //Converts PHP array → JSON
      return response()->json(["data"=>$tasks]);
    }
    public function update(){
       
    }
    public function destory($taskId){
       $tasks = session()->has('tasks')? session()->get('tasks'):[];

       $updatedTasks = array_values(array_filter($tasks,function($task) use($taskId){
            return $task['id']!= $taskId ;
       }));
       session()->put('tasks',$updatedTasks);
       return response()->json($updatedTasks);
    }
}
