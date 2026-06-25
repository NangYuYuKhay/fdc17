@extends('admin.layouts.app')

@section('title','Editing brand')

@section('style')
<style>

</style>
@endsection

@section('header','Editing brand details')

@section('content')
    <a href="{{ url('/admin/brands') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
   <form action="{{ url('/admin/brands/' .$data->id) }}" method="post" novalidate>
    <!-- use @method('PUT') because:
    HTML cannot send PUT requests
    This is a workaround ( called method spoofing) -->
    @method('PUT')
    @csrf()
   <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="brand_name" autofocus value="{{ old('brand_name' , $data->brand_name)  }}" >
        @if( $errors->has('brand_name') )
            <p class="text-danger">{{ $errors->first('brand_name') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="email" class="form-control" name="description" value="{{ old('description' , $data->description)  }}">
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