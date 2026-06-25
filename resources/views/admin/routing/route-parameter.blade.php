@extends('admin.layouts.app')

@section('title','Route Parameter')

@section('style')
<style>
    .box{
        width: 200px;
        height: 200px;
        background-color: {{ $boxBackgroundColor }};
    }
    .text{
        color: {{ $textColor}};
    }
</style>
@endsection

@section('header','Route parameter')

@section('content')
    <h3 class="text">This is a box.</h3>
    <div class="box"></div>
@endsection

@section('script')
<script>
</script>
@endsection