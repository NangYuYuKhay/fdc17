@extends('admin.layouts.app')

@section('title','localization')

@section('style')
@endsection

@section('header',__('localization.localization'))

@section('content')
    <form action="{{ url('/admin/blade-template/localization') }}" method="post">
        @csrf()
        <div class="mb-3">
            <label class="form-label">{{ __('localization.select_language') }}</label>
            <select class="form-select" aria-label="Default select example" name='lang'>
                <option value="en">{{ __('localization.english') }}</option>
                <option value="mm">{{ __('localization.myanmar') }}</option>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">{{ __('localization.change_language') }}</button>
        </div>
    </form>
    @if(session()->get('lang')=='mm')
        <h2>{{ __('localization.chose_myanmar_language') }}</h2>
    @else
        <h2>{{ __('localization.chose_english_language') }}</h2>
    @endif
@endsection

@section('script')
<script>
</script>
@endsection

