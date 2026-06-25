<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::select('*')->get();
        return view('admin.users.index')
            ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
        $request->all(),
        [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed'
        ]
        );
        if($validator->fails()){
            return redirect('/admin/users/create')
            ->withErrors($validator)
            ->withInput();
        }

      $data= [];
      $data['name'] = $request->name;
      $data['email'] = $request->email;
      $data['password'] = bcrypt($request->password);
      $data['created_at'] = Carbon::now() ;

      User::insert($data);
      session()->flash('message','You created a user successfully.');
      return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::select('email','name','created_at','updated_at')->find($id);
        return view('admin.users.show')
            ->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::select('id','email','name','created_at')->where('id',$id )->first();
        // dd($data);
        return view('admin.users.edit')
            ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
            ]
            );
            if($validator->fails()){
                return redirect("/admin/users/$id/edit")
                ->withErrors($validator)
                ->withInput();
            }
        
          $data= [];
          $data['name'] = $request->name;
          $data['email'] = $request->email;
          $data['updated_at'] = Carbon::now() ;
    
          User::where('id',$id)->update($data);
          session()->flash('message','You updated a record successfully.');
          return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return response()->json('You deleted a user successfully.');
    }
    public function resetPassword(string $id){
        $data = User::select('id')->find($id);
        return view('/admin/users/reset-password')
            ->with('data', $data );
    }
    public function updatePassword(Request $request,string $id){
       $validator = Validator::make(
        $request->all(),[
            "password" => "required|min:6|confirmed"
        ]);
        if($validator->fails()){
            return redirect("/admin/users/reset-password/${id}")
                ->withErrors($validator);
        };
        $data = [];
        $data['password'] = bcrypt($request->password);
        User::where('id',$id)->update($data);
        session()->flash('message','You have updated the password.');
        return redirect('/admin/users');
    }
}
