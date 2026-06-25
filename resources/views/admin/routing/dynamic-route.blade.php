@extends('admin.layouts.app')

@section('title','Dynamic route')

@section('style')
<style>

</style>
@endsection

@section('header','Dynamic route')

@section('content')
<form action="{{ url('admin/routing/dynamic-route') }}" method="post">
    @csrf()
    <div class="form-group mb-3">
        <label for="textColor">Text Color</label>
        <input type="text" class="form-control" name="text-color" required>
    </div>
    <div class="form-group mb-3">
        <label for="textColor">Box Color</label>
        <input type="text" class="form-control" name="box-color" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
    </div>
</form>

@endsection

@section('script')
<script>
    // $(document).ready(()=>{
    //     $('#submit').click(()=>{
    //         const boxColor = $('#boxColor').val();
    //         const textColor = $('#textColor').val();
    //         window.location.href = `http://127.0.0.1:8000/admin/routing/route-parameter/${boxColor}/${textColor}`
    //     })
    // })
</script>
@endsection