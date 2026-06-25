@extends('admin.layouts.app')

@section('title','Create item')

@section('style')
<style>

</style>
@endsection

@section('header','Create item')

@section('content')
    <a href="{{ url('/admin/items') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
   <form action="{{ url('/admin/items') }}" method="post" novalidate enctype="multipart/form-data">
    @csrf()
   <div class="mb-3">
        <label class="form-label">Item image</label>
        <input type="file" class="form-control" name="item_image" autofocus>
        @if( $errors->has('item_image') )
            <p class="text-danger">{{ $errors->first('item_image') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Item name</label>
        <input type="text" class="form-control" name="item_name" value="{{ old('item_name') }}" >
        @if( $errors->has('item_name') )
            <p class="text-danger">{{ $errors->first('item_name') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Brand name</label>
        <select class="form-select" name="brand_id">
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? "selected" : "" }}>{{$brand->brand_name}}</option>
            @endforeach
        </select>
        @if( $errors->has('brand_id') )
            <p class="text-danger">{{ $errors->first('brand_id') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Category name</label>
        <select class="form-select" name="category_id" value="{{ old('category_id') }}">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id? "selected" : "" }}>{{$category->category_name}}</option>
            @endforeach
        </select>
        @if( $errors->has('category_id') )
            <p class="text-danger">{{ $errors->first('brand_category_idid') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Item code</label>
        <input type="text" class="form-control" name="item_code" autofocus value="{{ old('item_code') }}" >
        @if( $errors->has('item_code') )
            <p class="text-danger">{{ $errors->first('item_code') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" class="form-control" name="price" autofocus value="{{ old('price') }}" >
        @if( $errors->has('price') )
            <p class="text-danger">{{ $errors->first('price') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
        @if($errors->has('description'))
            <p class="text-danger">{{ $errors->first('description') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <button class="btn btn-primary">
            <i class="fa-solid fa-floppy-disk"></i>
            Save
        </button>
    </div>
   </form>
@endsection

@section('script')
<script>
    console('THis is page 1.')
</script>
@endsection