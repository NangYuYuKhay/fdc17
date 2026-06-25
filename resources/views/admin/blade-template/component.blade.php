@extends('admin.layouts.app')

@section('title','Component')

@section('style')
<style>
</style>
@endsection

@section('header','Component')

@section('content')
@if(session()->get('lang')=='mm')
        <h2>{{ __('localization.chose_myanmar_language') }}</h2>
    @else
        <h2>{{ __('localization.chose_english_language') }}</h2>
    @endif
<pre>
    creating component
    ******************
    php artisan make:component Alert
    laravel component
    *****************
    1) Component UI >>> (resources/view/components/...)
    2) Component Controller (Business Logic) >>> (app/view/components/...)
    Component Attribute Databinding
    *******************************
    When you databind in the component attribute,
    There are two way ->
    1) if you bind the value to the attribute, you can bind directly like the following example
    example > type="success"
    2) if you bind the variable to the attribute, you can bind like the following example
    example > :type="$success"

    Note -
    (1) pass attribute value to Component Controller Constructor Arguments
    (2) assign the data from arguments to controller variables
    (3) bind controller variables to component user interface
</pre>

<h2>Component with static data</h2>
<x-alert type="info" title="Info alert" description="This is an info alert"></x-alert>
<x-alert type="secondary" title="Secondary alert" description="This is a secondary alert"></x-alert>
<x-alert type="dark" title="Dark alert" description="This is a dark alert"></x-alert>

<h2>Component with dynamic data</h2>
@foreach($alerts as $alert)
    <x-alert :type="$alert['type']" :title="$alert['title']" :description="$alert['description']"></x-alert>
@endforeach

<h2>Child Props</h2>
<x-child-props>
    <x-slot name='title'>Card 1</x-slot>
    <x-slot name='description'>Card 1 Description</x-slot>
    <button class="btn btn-info">Create</button>
</x-child-props>

<x-child-props>
    <x-slot name='title'>Card 2</x-slot>
    <x-slot name='description'>Card 2 Description</x-slot>
    <button class="btn btn-success">Create</button>
</x-child-props>

<x-child-props>
    <x-slot name='title'>Card 3</x-slot>
    <x-slot name='description'>Card 3 Description</x-slot>
    <button class="btn btn-warning">Create</button>
</x-child-props>
<pre>






</pre>
@endsection

@section('script')
<script>

</script>
@endsection