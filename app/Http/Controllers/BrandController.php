<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BrandController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brand::select('*')->get();
        return view('admin.brands.index')
            ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Validator = Validator::make(
            $request->all(),
            [
                "brand_name" => "required|unique:brands",
                "description" => "required"
            ]
        );
        if($Validator->fails()){
            return redirect('/admin/brands/create')
            ->withErrors($Validator)
            ->withInput();
        }

        $data = [];
        $data['brand_name'] = $request->brand_name;
        $data['description'] = $request->description;
        $data['created_at'] = Carbon::now();

        Brand::insert($data);
        session()->flash('message','You saved a record');
        return redirect('/admin/brands');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show')
            ->with('data',$brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit')
        ->with('data', $brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $Validator = Validator::make(
            $request->all(),[
                "brand_name" => "required|unique:brands,brand_name," .$brand->id,
                "description" => "required"
            ]
        );
        if($Validator->fails()){
            return redirect("/admin/brands/$brand->id/edit")
                ->withErrors($Validator)
                ->withInput();
        }

        
        $data = [];
        $data['brand_name'] = $request->brand_name ; 
        $data['description'] = $request->description ; 
        // $data['created_at'] = $brand->created_at ; 
        $data['updated_at'] = Carbon::now() ;

       

        Brand::where('id',$brand->id)->update($data);
        session()->flash('message','You updated the record.');
        return redirect('/admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::where('id',$brand->id)->delete();
        return response()->json('You delected the record.');
    }
}
