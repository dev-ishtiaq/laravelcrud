<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }
    public function create_product()
    {
        return view('products.create');
    }
    public function products_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' =>'required',
            'image' =>'required|mimes:png,jpg,jpeg,gif|max:10000',
            ]);


        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->image = $request->image;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product->save();
        return back();
    }

}
