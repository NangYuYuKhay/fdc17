@extends('admin.layouts.app')

@section('title','Session lecture')

@section('style')
</style>
@endsection

@section('header','Session lecture')

@section('content')
    <h1>Get session</h1>
    <p>Name: {{ session()->has('name')? session()->get('name') : "\u{274C}" }}</p>
    <p>Name: {{ session()->has('age')? session()->get('age') : "\u{274C}" }}</p>
    <p>Name: {{ session()->has('address')? session()->get('address') : "\u{274C}" }}</p>
    <hr>
    <h1>Put session</h1>
    <form action="{{ url('admin/session/put') }}" method="post">
        @csrf()
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="text" class="form-control" name="age" >
        </div>
        <div class="mb-3">
            <label class="form-label">address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Put session</button>
        </div>
    </form>

    <h1>Delete session</h1>
    <form action="{{ url('admin/session/delete/name') }}" method="post" class="mb-3">
        @csrf()
        <div class="mb-3">
            <button class="btn btn-primary" type="submit" >Delete name</button>
        </div>
    </form>
    <form action="{{ url('admin/session/delete/age') }}" method="post" class="mb-3">
        @csrf()
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Delete age</button>
        </div>
    </form>
    <form action="{{ url('admin/session/delete/address') }}" method="post" class="mb-3">
        @csrf()
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Delete address</button>
        </div>
    </form>
    <form action="{{ url('admin/session/delete/delete-all') }}" method="post" class="mb-3">
        @csrf()
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Delete All</button>
        </div>
    </form>
@endsection

@section('script')
<script>
</script>
@endsection