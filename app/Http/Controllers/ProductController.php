<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

        return view('products.index',[
            'products'=>Product::latest()->paginate(5)
        ]);
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

        // $image = $request->image;

        // if($image)
        // {
        //     $imagename = time().'.'.$image->getClientOriginalExtension();
        //     $request->image->move('products', $imagename);
        //     $product->image = $imagename;
        //     }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move('products', $imageName);
        $product->image = $imageName;

        $product->save();
        return back()->with('message','Product created!');
    }
    public function products_edit($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.edit', ['product' => $product]);
    }
    public function products_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' =>'required',
            'image' =>'nullable|mimes:png,jpg,jpeg,gif|max:10000',
            ]);
            $product = Product::where('id', $id)->first();
            if(isset($request->image))
            {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move('products', $imageName);
                $product->image = $imageName;
            }
        $product->name = $request->name;
        $product->description = $request->description;

        // $image = $request->image;

        // if($image)
        // {
        //     $imagename = time().'.'.$image->getClientOriginalExtension();
        //     $request->image->move('products', $imagename);
        //     $product->image = $imagename;
        //     }



        $product->save();
        return back()->with('message','Product updated!');
    }
    public function products_delete($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->with('message','Product deleted!');
    }
    public function products_show($id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.show', ['product'=>$product]);
    }

}
