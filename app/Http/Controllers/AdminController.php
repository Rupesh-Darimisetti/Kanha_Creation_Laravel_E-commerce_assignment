<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
    
    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('delete_message', 'Category deleted successfully');
    }

    public function updateCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.updatecategory', compact('category'));
    }

    public function postUpdateCategory(Request $request,$id){
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_updated_message', 'Category upadated successfully');
    }

    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.addproduct',compact('categories'));
    }

    public function postAddProduct(Request $request){
        $product = new Product();
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;

        $image = $request->file('product_image');
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);            
            $product->product_image = $imagename;
        }
        
        $product->product_category = $request->product_category;
        $product->save();

        // if($image && $product->save()){
        //     $request->product_image->move('products', $image);
        // }
        return redirect()->back()->with('product_message', 'Product added successfully');
    }
}
