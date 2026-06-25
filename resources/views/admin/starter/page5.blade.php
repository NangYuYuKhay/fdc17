@extends('admin.layouts.app')

@section('title','Page5')

@section('style')
<style>
    h1{
    background:linear-gradient(90deg,gray,orange);
    text-align:center;
    padding: 10px;
    color:white;
    }
</style>
@endsection

@section('header','Page5')

@section('content')
    <h1>This is page 5.</h1>
@endsection

@section('script')
<script>
    console('THis is page 5.')
</script>
@endsection