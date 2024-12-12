<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::get();
        return view('products.index', ['products' => $products]);
    }
    public function create()
    {
        return view('products.add_product');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $image_name = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $image_name);

        $product = new product;
        $product->image = $image_name;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('Product Added Successfully !!!');
    }
    public function edit($id)
    {
        $product = product::where('id', $id)->first();
        return view('products.editproduct', ['product' => $product]);
    }
    public  function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $product = product::where('id', $id)->first();
        if (isset($request->image)) {
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $image_name);
            $product->image = $image_name;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('Product Updated Successfully !!!');
    }
    public function destroy($id)
    {
        $product=product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully !!!');

    }
}
