@extends('admin.layouts.app')

@section('title','Passing Data to View')

@section('style')
<style>
    h1{
    background:linear-gradient(90deg,black,white);
    text-align:center;
    padding: 10px;
    color:white;
    }
</style>
@endsection

@section('header','Passing Data to View')

@section('content')
   <h5 class="mb-3">List Items</h5>
   <!-- index array -->
   @foreach($listItem as $item)
    <ul class="list-group">
        <li class="list-group-item">{{ $item }}</li>
    </ul>
   @endforeach
    <hr>

   <h5 class="mb-3">Buttons</h5>
   <!-- key value array -->
   @foreach($btns as $btn)
        <button class="btn btn-{{ $btn['type'] }}">{{ $btn['text'] }}</button>
   @endforeach

   <hr>
   <h5 class="mb-3">Alerts</h5>
   <!-- object array -->
   @foreach($alts as $alert)
   <div class="alert alert-{{ $alert->type}}" role="alert">
        This is a {{ $alert->text }} alert—check it out!
   </div>  
   @endforeach
@endsection

@section('script')
<script>
    console('This is Passing Data to View.')
</script>
@endsection