@extends('admin.layouts.app')

@section('title','Create brand')

@section('style')
<style>

</style>
@endsection

@section('header','Create brand')

@section('content')
    <a href="{{ url('/admin/brands') }}" class="btn btn-primary">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
   <form action="{{ url('/admin/brands') }}" method="post" novalidate>
    @csrf()
   <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="brand_name" autofocus value="{{ old('brand_name') }}" >
        @if( $errors->has('brand_name') )
            <p class="text-danger">{{ $errors->first('brand_name') }}</p>    
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