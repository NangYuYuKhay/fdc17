@extends('admin.layouts.app')

@section('title','Order info')

@section('style')
<style>

</style>
@endsection

@section('header','Order info')

@section('content')
    <a href="{{ url('/admin/orders') }}" class="btn btn-primary mb-3">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Item image</th>
            <th scope="col">Item name</th>
            <th scope="col">Item code</th>
            <th scope="col">Item price</th>
            <th scope="col">Item quantity</th>
            <th scope="col">Sub total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item->order_id}}</td>
                <td>
                    <img src="{{ asset('/storage/' .$item->item_image) }}" alt="" style="width:55px;height:55px;">   
                </td>
                <td>{{$item->item_name}}</td>
                <td>{{$item->item_code}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->sub_total}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('script')
<script>
</script>
@endsection