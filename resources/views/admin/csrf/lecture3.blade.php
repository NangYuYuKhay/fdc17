@extends('admin.layouts.app')

@section('title','Lecture3')

@section('style')
<style>
</style>
@endsection

@section('header','Lecture3')

@section('content')
    <h1>This is Csrf Lecture3.</h1>
    <button  class="btn btn-primary" id="btn-get-items">Get items</button>
    <hr>
    <ul class="list-group">
    </ul>

@endsection

@section('script')
<script>
    $(document).ready(()=>{
        $('#btn-get-items').click(()=>{
            $.ajax({
                url: "/admin/csrf/get-items", 
                type: "POST",
                data:{
                    "_token" : "{{ csrf_token() }}"
                },                       
                success: function(response) { 
                    const items = response ;
                    items.forEach(i =>{
                            $('.list-group').append( `<li class="list-group-item">${i}</li>`)
                    });
                }
            });
        })
    })
</script>
@endsection