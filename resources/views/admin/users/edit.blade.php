@extends('admin.layouts.app')

@section('title','User Infos')

@section('style')
<style>

</style>
@endsection

@section('header','Editing User details')

@section('content')
    <a href="{{ url('/admin/users') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
   <form action="{{ url('/admin/users/' .$data->id) }}" method="post" novalidate>
    <!-- use @method('PUT') because:
    HTML cannot send PUT requests
    This is a workaround ( called method spoofing) -->
    @method('PUT')
    @csrf()
   <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" autofocus value="{{ old('name' , $data->name)  }}" >
        @if( $errors->has('name') )
            <p class="text-danger">{{ $errors->first('name') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email' , $data->email)  }}">
        @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email') }}</p>    
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