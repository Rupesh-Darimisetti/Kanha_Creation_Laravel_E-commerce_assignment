@extends('admin.maindesign')
@if(session('delete_message'))
    <div class='mb-4 bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative'>
        {{ session('delete_message') }}
    </div>
@endif
@section('view_product')
<table style='width:100%; border-collapse:collapse; font-family:Arial, sans-serif;'>
    <thead>
        <tr style='background-color:#f2f2f2;'>
            <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Product Title</th>
            <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Product Description</th>
            <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Product Quantity</th>
            <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Product Price</th>
            <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Product Image</th>
            <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Product Category</th>
            <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Action</th>
        </tr>
    <thead>
    <tbody>
        @foreach($products as $product)
        <tr style='border-bottom:1px solid #ddd;'>
            <td style='padding:12px'>{{ $product->id }}</td>
            <td style='padding:12px'>{{ $product->product_title }}</td>
            <td style='padding:12px'>{{ Str::limit($product->product_description,50) }}</td>
            <td style='padding:12px'>{{ $product->product_quantity }}</td>
            <td style='padding:12px'>{{ $product->product_price }}</td>
            <td style='padding:12px'><img src="{{ asset('products/'.$product->product_image )}}" width='150px'/></td>
            <td style='padding:12px'>{{ $product->product_category }}</td>
            {{-- <td style='padding:12px'><a href="{{ route('admin.editcategory', $category->id) }}" class='btn btn-primary'>Edit</a></td> --}}
            <td style='padding:12px'>
                <a href="{{ route('admin.updatecategory',$product->id) }}" style='color:green'>Update</a>
                <a href="{{ route('admin.deleteproduct', $product->id) }}" class='btn btn-danger' onclick="return confirm('Are you sure')">Delete</a>
            </td>
        </tr>
    @endforeach

    {{ $products->links() }}
    </tbody>
</table>
@endsection