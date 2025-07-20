@extends('admin.maindesign')
@if(session('delete_message'))
    <div class='mb-4 bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative'>
        {{ session('delete_message') }}
    </div>
@endif
@section('viewcategory')
<table style='width:100%; border-collapse:collapse; font-family:Arial, sans-serif;'>
    <tr style='background-color:#f2f2f2;'>
        <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Category ID</th>
        <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Category Name</th>
        <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Action</th>
    </tr>
    @foreach($categories as $category)
    <tr style='border-bottom:1px solid #ddd;'>
        <td style='padding:12px'>{{ $category->id }}</td>
        <td style='padding:12px'>{{ $category->category }}</td>
        {{-- <td style='padding:12px'><a href="{{ route('admin.editcategory', $category->id) }}" class='btn btn-primary'>Edit</a></td> --}}
        <td style='padding:12px'>
            <a href="{{ route('admin.updatecategory',$category->id) }}" style='color:green'>Update</a>
            <a href="{{ route('admin.deletecategory', $category->id) }}" class='btn btn-danger' onclick="return confirm('Are you sure')">Delete</a>
        </td>
    </tr>
    @endforeach
@endsection