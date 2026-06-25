@extends('admin.layouts.app')

@section('title','Page2')

@section('style')
<style>
    h1{
    background:linear-gradient(90deg,black,pink);
    text-align:center;
    padding: 10px;
    color:white;
    }
</style>
@endsection

@section('header','Page2')

@section('content')
    <h1>This is page 2.</h1>
@endsection

@section('script')
<script>
    console('THis is page 2.')
</script>
@endsection