@extends('admin.layouts.app')

@section('title','View Only')

@section('style')
<style>
    h1{
    background:linear-gradient(90deg,darkblue,black);
    text-align:center;
    padding: 10px;
    color:white;
    }
</style>
@endsection

@section('header','View Only')

@section('content')
    <h1>This is view only.</h1>
@endsection

@section('script')
<script>
    console('THis is view only.')
</script>
@endsection