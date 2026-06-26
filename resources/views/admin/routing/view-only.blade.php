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
    <h1>Items</h1>
    <div id="items">
    <ul class="list-group">

    </ul>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(()=>{
        $.ajax({
            url : "/api/get-items",
            type : "GET",
            success: function(response){
                console.log(response)
                const items = response;
                items.forEach(item => {
                    $(".list-group").append(` <li class="list-group-item">${item.item_name}</li>`)
                });
            }
        });
    })
</script>
@endsection