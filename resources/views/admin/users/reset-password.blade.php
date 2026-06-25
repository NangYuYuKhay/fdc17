@extends('admin.layouts.app')

@section('title','Reset password')

@section('style')
<style>

</style>
@endsection

@section('header','Reset password')

@section('content')
    <a href="{{ url('/admin/users') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
   <form action="{{ url('/admin/users/reset-password/' .$data->id) }}" method="post" novalidate>
    @method('PUT')
    @csrf()
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" autofocus>
        @if($errors->has('password'))
            <p class="text-danger">{{ $errors->first('password') }}</p>    
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm password</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>
    <div class="mb-3">
        <button class="btn btn-warning">
            <i class="fa-solid fa-key"></i>
            Reset
        </button>
    </div>
   </form>
@endsection

@section('script')
<script>
</script>
@endsection