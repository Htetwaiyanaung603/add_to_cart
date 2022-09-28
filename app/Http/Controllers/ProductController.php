<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = products::all();
        return view('product.index', compact('products'));
    }

    public function create() {
        return view('product.create');
    }

    public function add(Request $request){
        
        $request->validate(
           [ "name" => "required",
            "photo" => "required",
            "price" => "required",]
        );

        $product = new products();
        $product->name = $request->name;
        $product->photo = $request->photo;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();
        return redirect(route('productIndex'))->with('success', $product->name.' add successfully.');
    }

    public function edit($id) {
        $product = products::find($id);
        return view('product.edit', compact('product'));
    }

    public function update($id, Request $request){
        
        $product = products::find($id);
        $product->name = $request->name;
        $product->photo = $request->photo;
        $product->price = $request->price;
        $product->description = $request->description;

        if($product->save()){
            return redirect(route('productIndex'))->with('success', 'Product Update Successfully!');
        }
    }

    public function delete($id){
        products::find($id)->delete();
        return redirect(route('productIndex'))->with('success', 'Product Delete Successfully!');
    }
}
