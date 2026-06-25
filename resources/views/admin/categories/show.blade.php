@extends('admin.layouts.app')

@section('title','Category info')

@section('style')
<style>

</style>
@endsection

@section('header','Category info')

@section('content')
    <a href="{{ url('/admin/categories') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Label</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="col">Category name</th>
            <th scope="col">{{ $data->category_name }}</th>
        </tr>
        <tr>
            <th scope="col">Description</th>
            <th scope="col">{{ $data->description }}</th>
        </tr>
        <tr>
            <th scope="col">Create at</th>
            <th scope="col">{{ $data->created_at }}</th>
        </tr>
        <tr>
            <th scope="col">Updated at</th>
            <th scope="col">{{ $data->updated_at }}</th>
        </tr>
        </tbody>
    </table>
@endsection

@section('script')
<script>
</script>
@endsection