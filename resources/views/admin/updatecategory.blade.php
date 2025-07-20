@extends('admin.maindesign')
<base href="/public">
@section('update_category')
@if(session('category_updated_message'))
    <div class='mb-4 bg-blue-100 border-blue-400 text-blue-700 px-4 py-3 rounded relative'>
        {{ session('category_updated_message') }}
    </div>
@endif
    <div class="container-fluid">
        <form action='{{ route('admin.postupdatecategory',$category->id) }}' method='POST'>
            @csrf
            <input type='text' name='category' value="{{ $category->category }}" class='form-control'>
            <input type='submit' value='update Category' class='btn btn-primary mt-3'>

        </form>
    </div>
@endsection