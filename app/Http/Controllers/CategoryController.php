<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::get();
        return view('admin.categories.index')
         ->with('data',$category);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "category_name" => "required|unique:categories",
                "description" => "required",
            ]
        );
        if($validator->fails()){
            return redirect('/admin/categories/create')
             ->withErrors($validator)
             ->withInput();
        }

        $data = [];
        $data['category_name'] = $request['category_name'];
        $data['description'] = $request['description'];
        $data['created_at'] = Carbon::now();

        Category::insert($data);
        session()->flash('message','You created a category.');
        return redirect('/admin/categories');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show')
        ->with('data',$category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')
        ->with('data',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "category_name" => "required|unique:categories,category_name," .$category->id,
                "description" => "required",
            ]
        );
        if($validator->fails()){
            return redirect('/admin/categories/create')
             ->withErrors($validator)
             ->withInput();
        }

        $data = [];
        $data['category_name'] = $request['category_name'];
        $data['description'] = $request['description'];
        $data['updated_at'] = Carbon::now();

        Category::where('id',$category->id)->update($data);
        session()->flash('message','You updated a category.');
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::where('id',$category->id)->delete();
        session->flash('message','You deleted a category.');
    }
}
