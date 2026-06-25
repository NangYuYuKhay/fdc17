<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ItemController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Item::select('items.*','brands.brand_name','categories.category_name')
        ->leftJoin('brands','brands.id','items.brand_id')
        ->leftJoin('categories','categories.id','items.category_id')
        ->get();
        return view('admin.items.index')
        ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::get();
        $category = Category::get();
        return view('admin.items.create')
            ->with('brands',$brand)
            ->with('categories',$category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "item_image" => "required|image|mimes:jpg,png,jpeng,webp",
                "item_name" => "required|unique:items",
                "brand_id" => "required",
                "category_id" => "required",
                "item_code" => "required|unique:items",
                "price" => "required"
            ]
        );
        if($validator->fails()){
            return redirect('/admin/items/create')
                ->withErrors($validator)
                ->withInput();
        }

        $itemImagePath = $request->file('item_image')->store('items','public');
        $data = [];
        $data['item_image'] = $itemImagePath;
        $data['item_name'] = $request['item_name'];
        $data['brand_id'] = $request['brand_id'];
        $data['category_id'] = $request['category_id'];
        $data['item_code'] = $request['item_code'];
        $data['price'] = $request['price'];
        $data['description'] = $request['description'];
        $data['created_at'] = Carbon::now();

        Item::insert($data);
        session()->flash('message','You created the record successfully.');
        return redirect('/admin/items');
     }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $data = Item::select('items.*','brands.brand_name','categories.category_name')
        ->leftJoin('brands','brands.id','items.brand_id')
        ->leftJoin('categories','categories.id','items.category_id')
        //use items.id to clarify that we are saying the id of items table
        ->where('items.id',$item->id)
        //use first() to get data from the first row of the database
        ->first();
        return view('admin.items.show')
        ->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $brand = Brand::get();
        $category = Category::get();
        return view('admin.items.edit')
            ->with('data',$item)
            ->with('brands',$brand)
            ->with('categories',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $hasFile = $request->hasFile('item_image');
        if($hasFile){
            $validator = Validator::make(
                $request->all(),
                [
                    "item_image" => "required|image|mimes:jpg,png,jpeng,webp",
                    "item_name" => "required|unique:items,item_name,".$item->id,
                    "brand_id" => "required",
                    "category_id" => "required",
                    "item_code" => "required|unique:items,item_code,".$item->id,
                    "price" => "required"
                ]
            );
        }else{
            $validator = Validator::make(
                $request->all(),
                [
                    "item_name" => "required|unique:items,item_name,".$item->id,
                    "brand_id" => "required",
                    "category_id" => "required",
                    "item_code" => "required|unique:items,item_code,".$item->id,
                    "price" => "required"
                ]
            );
        }
        if($validator->fails()){
            return redirect("/admin/items/$item->id/edit")
                ->withErrors($validator)
                ->withInput();
        }
        if($hasFile){
            if($item->item_image){
                Storage::disk('public')->delete($item->item_image);
            }
             $itemImagePath = $request->file('item_image')->store('items','public');
        }
        $data = [];
        if($hasFile){
            $data['item_image'] = $itemImagePath;
        }
        $data['item_name'] = $request['item_name'];
        $data['brand_id'] = $request['brand_id'];
        $data['category_id'] = $request['category_id'];
        $data['item_code'] = $request['item_code'];
        $data['price'] = $request['price'];
        $data['description'] = $request['description'];
        $data['updated_at'] = Carbon::now();

        Item::where('id',$item->id)->update($data);
        session()->flash('message','You updated the record successfully.');
        return redirect('/admin/items');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if($item->item_image){
            Storage::disk('public')->delete($item->item_image);
        }
        Item::where('id',$item->id)->delete();
        return response()->json('You deleted the record successfully');
    }
}
