@extends('admin.maindesign')

@section('add_product')
@if(session('product_message'))
<div class='mb-4 bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded relative'>
    {{ session('product_message') }}
</div>
@endif
    <div class="container-fluid">
        <form action='{{ route('admin.postaddproduct') }}' method='POST' enctype='multipart/form-data'>
            @csrf 
            <input type='text' name='product_title' placeholder='Enter Product Title' class='form-control'>
            <textarea name='product_description' placeholder='Enter Product Description' class='form-control'>
                Product description goes here...
            </textarea>
            <input type='number' name='product_quantity' placeholder='Enter Product Quantity here!' class='form-control'> 
            <input type='number' name='product_price' placeholder='Enter Product Price here!' class='form-control'>
            <input type='file' name='product_image' class='form-control'>
            <select name='product_category' style='width: 100%; padding: 10px;'>
                @foreach ( $categories as $category )
                    <option value="{{ $category->category}}">{{$category->category}}</option>
                @endforeach
            </select>
            
            <input type='submit' value='Add Product' class='btn btn-primary mt-3'>

        </form>
    </div>
@endsection