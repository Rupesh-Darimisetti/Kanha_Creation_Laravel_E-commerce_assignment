<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function addcategory()
    {
        return view('admin.addcategory');
    }
    public function postAddCategory(Request $request){
        $category = new Category();
        $category = $request->category;
        $category->save();
        return redirect()->back()->with('caetegory_message', 'Category added successfully');
    }
}
