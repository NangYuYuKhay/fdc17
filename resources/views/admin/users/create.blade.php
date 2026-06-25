@extends('admin.layouts.app')

@section('title','User Infos')

@section('style')
<style>

</style>
@endsection

@section('header','User details')

@section('content')
    <a href="{{ url('/admin/users') }}" class="btn btn-primary">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
   <form action="{{ url('/admin/users') }}" method="post" novalidate>
    @csrf()
   <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" autofocus value="{{ old('name') }}" >
        @if( $errors->has('name') )
            <p class="text-danger">{{ $errors->first('name') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
        @if($errors->has('password'))
            <p class="text-danger">{{ $errors->first('password') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm password</label>
        <input type="password" class="form-control" name="password_confirmation">
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