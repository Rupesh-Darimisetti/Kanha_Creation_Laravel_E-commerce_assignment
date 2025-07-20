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
        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_message', 'Category added successfully');
    }
    
    public function viewCategory(){
        $categories = Category::all();
        return view('admin.viewcategory',compact('categories'));
    }
    
}
