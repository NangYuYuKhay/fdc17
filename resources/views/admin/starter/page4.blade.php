@extends('admin.layouts.app')

@section('title','Page4')

@section('style')
<style>
    h1{
    background:linear-gradient(90deg,lightblue,purple);
    text-align:center;
    padding: 10px;
    color:white;
    }
</style>
@endsection

@section('header','Page4')

@section('content')
    <h1>This is page 4.</h1>
@endsection

@section('script')
<script>
    console('THis is page 4.')
</script>
@endsection