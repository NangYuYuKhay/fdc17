@extends('admin.layouts.app')

@section('title','Create category')

@section('style')
<style>

</style>
@endsection

@section('header','Create category')

@section('content')
    <a href="{{ url('/admin/categories') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
   <form action="{{ url('/admin/categories') }}" method="post" novalidate>
    @csrf()
   <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="category_name" autofocus value="{{ old('category_name') }}" >
        @if( $errors->has('category_name') )
            <p class="text-danger">{{ $errors->first('category_name') }}</p>    
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
</script>
@endsection