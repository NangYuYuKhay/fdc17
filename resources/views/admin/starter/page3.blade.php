@extends('admin.layouts.app')

@section('title','Page3')

@section('style')
<style>
    h1{
    background:linear-gradient(90deg,purple,yellow);
    text-align:center;
    padding: 10px;
    color:white;
    }
</style>
@endsection

@section('header','Page3')

@section('content')
    <h1>This is page 3.</h1>
@endsection

@section('script')
<script>
    console('THis is page 3.')
</script>
@endsection