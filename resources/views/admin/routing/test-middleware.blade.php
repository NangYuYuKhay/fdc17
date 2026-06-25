@extends('admin.layouts.app')

@section('title','Test Middleware')

@section('style')
<style>
</style>
@endsection
    
@section('header','Test Middleware')

@section('content')
    <form action="{{ url('/admin/routing/post-test-middleware') }}" method="post">
        @csrf()
        <div class="mb-3">
            <label class="form-label">Enter age</label>
            <input class="form-control" type="number" name="age">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Send request</button>
        </div>
    </form>
@endsection

@section('script')
<script>
</script>
@endsection