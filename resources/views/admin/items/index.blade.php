@extends('admin.layouts.app')

@section('title','Items')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css">
<style>
</style>
@endsection

@section('header','Items')

@section('content')
<a href="{{ url('/admin/items/create') }}" class="btn btn-primary mb-3">
    <i class="fa-solid fa-plus"></i>
    Create
</a>

<table id="table" class="display">
        <thead>
            <tr>
                <th class="text-center">Actions</th>
                <th class="text-center">Item image</th>
                <th class="text-center">Item name</th>
                <th class="text-center">Item code</th>
                <th class="text-center">Brand name</th>
                <th class="text-center">Category name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Description</th>
                <th class="text-center">Created_at</th>
                <th class="text-center">Updated at</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
        <tr class="text-center">
            <td>
                <a href="{{ url('admin/items/' .$item->id ) }}" class="btn btn-info">
                <i class="fa-solid fa-bars"></i>
                Show
                </a>
                <a href="{{ url('admin/items/' .$item->id. '/edit') }}" class="btn btn-secondary">
                <i class="fa-regular fa-pen-to-square"></i>
                Edit
                </a>
                <button class="btn btn-danger btn-delete" data-id="{{ $item->id }}">
                <i class="fa-solid fa-trash-can"></i>
                Delete
                </button>

            </td>
            <td class="text-center">
            <img src="{{ asset('/storage/' .$item->item_image) }}" alt="" style="width:100px;height:100px;">
            </td>
            <td class="text-center">{{ $item->item_name  }}</td>
            <td class="text-center">{{ $item->item_code  }}</td>
            <td class="text-center">{{ $item->brand_name  }}</td>
            <td class="text-center">{{ $item->category_name  }}</td>
            <td class="text-center">{{ $item->price  }}</td>
            <td class="text-center">{{ $item->description  }}</td>
            <td class="text-center">{{ $item->created_at  }}</td>
            <td class="text-center">{{ $item->updated_at  }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('script')
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
<script>
    const message = "{{ session()->has('message')? session()->get('message'): ''  }}"
    if(message){
        myToast(message);
    }
    $('document').ready(()=>{
        $('#table').DataTable();
    })


    $('.btn-delete').click((event)=>{
        const button = event.currentTarget;
        const userRow = $(button).parent().parent()
        //cleaner dom
        //const userRow = $(button).closest('tr');
        const id = $(button).data('id');
        destroy(id,userRow);

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                destroy(id)
                userRow.remove()
                Swal.fire({
                title: "Deleted!",
                text: "Your record has been deleted.",
                icon: "success"
            });
        }
        });
    })

    function destroy(id,userRow){
        $.ajax({
            url: `/admin/items/${id}`,
            method: "delete" ,
            data : {
                _token : '{{ csrf_token() }}'
            },
        });
    }

</script>
@endsection