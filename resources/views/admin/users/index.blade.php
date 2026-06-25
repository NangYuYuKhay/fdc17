@extends('admin.layouts.app')

@section('title','Users')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css">
<style>
</style>
@endsection

@section('header','Users')

@section('content')
<a href="{{ url('/admin/users/create') }}" class="btn btn-primary mb-3">
    <i class="fa-solid fa-plus"></i>
    Create
</a>

<table id="table" class="display">
        <thead>
            <tr>
                <th class="text-center">Actions</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Created_at</th>
                <th class="text-center">Updated at</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $user)
        <tr class="text-center">
            <td>
                <a href="{{ url('admin/users/' .$user->id ) }}" class="btn btn-info">
                <i class="fa-solid fa-bars"></i>
                Show
                </a>
                <a href="{{ url('admin/users/' .$user->id. '/edit') }}" class="btn btn-secondary">
                <i class="fa-regular fa-pen-to-square"></i>
                Edit
                </a>
                <button class="btn btn-danger btn-delete" data-id="{{ $user->id }}">
                <i class="fa-solid fa-trash-can"></i>
                Delete
                </button>
                <a href="{{ url('admin/users/reset-password/' .$user->id) }}" class="btn btn-warning">
                <i class="fa-solid fa-key"></i>
                Reset password
                </a>
            </td>
            <td>{{ $user->name  }}</td>
            <td>{{ $user->email  }}</td>
            <td class="text-center">{{ $user->created_at  }}</td>
            <td class="text-center">{{ $user->updated_at  }}</td>
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

    // $(document).on('click','.btn-danger',()=>{
    //     const button = event.currentTarget;
    //     const jQueryBtn = $(button)
    //     const id = jQueryBtn.data('id');
    //     console.log(id);
    // })
    // ^
    // |
    // sayar yay pya tae code

    //my own code
     // |
     // V

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
                text: "Your file has been deleted.",
                icon: "success"
            });
        }
        });
    })

    function destroy(id,userRow){
        $.ajax({
            url: `/admin/users/${id}`,
            method: "delete" ,
            data : {
                _token : '{{ csrf_token() }}'
            },
        });
    }

</script>
@endsection