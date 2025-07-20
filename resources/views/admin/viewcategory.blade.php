@extends('admin.maindesign')

@section('viewcategory')
<table style='width:100%; border-collapse:collapse; font-family:Arial, sans-serif;'>
    <tr style='background-color:#f2f2f2;'>
        <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Category ID</th>
        <th style='padding:12px; text-align:left; border-bottom:1px solid #ddd'>Category Name</th>
    </tr>
    @foreach($categories as $category)
    <tr style='border-bottom:1px solid #ddd;'>
        <td style='padding:12px'>{{ $category->id }}</td>
        <td style='padding:12px'>{{ $category->category }}</td>
    </tr>
    @endforeach
@endsection