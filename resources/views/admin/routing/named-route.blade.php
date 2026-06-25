@extends('admin.layouts.app')

@section('title','Named route')

@section('style')
<style>
</style>
@endsection

@section('header','Named route')

@section('content')
    <h1>{{ url('admin/routing/named-route') }}</h1>
    <h1>{{ route('routing.named-route') }}</h1>
@endsection

@section('script')
<script>
</script>
@endsection