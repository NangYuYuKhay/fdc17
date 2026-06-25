@extends('admin.layouts.app')

@section('title','Page1')

@section('style')
<style>
    h1{
    background:linear-gradient(90deg,lightblue,pink);
    text-align:center;
    padding: 10px;
    color:white;
    }
</style>
@endsection

@section('header','Page1')

@section('content')
    <h1>This is page 1.</h1>
@endsection

@section('script')
<script>
    console('THis is page 1.')
</script>
@endsection