@extends('admin.layouts.app')

@section('title','Lecture1')

@section('style')
<style>
</style>
@endsection

@section('header','Lecture1')

@section('content')
    <h1>This is CSRF Lecture1.</h1>
    <form action="{{ url('admin/csrf/create') }}" method="post">
    @csrf()
        <div class="mb-3">
            <label class="form-label">Enter name</label>
            <input class="form-control" type="text" name="name">
        </div>
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