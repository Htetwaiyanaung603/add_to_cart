<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function product_all () {
        $products = products::all();
        
        return view('cart.product', compact('products'));
    }

    public function addtocart ($id) {

        $products = products::find($id);
        
        $carts = session()->get('carts', []);

       if(isset($carts[$id])){
        $carts[$id]['quantity']++;
       }else{
        $carts[$id] = [
            'name' => $products->name,
            'photo' => $products->photo,
            'price' => $products->price,
            'quantity' => 1,
        ];
       }

        

        session()->put('carts', $carts);

        return back()->with('success', 'Cart added successfully!');
    }

    public function cart() {

        return view('cart.cart');
    }

    public function cart_update(Request $request) {
        


        if($request->id && $request->quantity){

            $carts = session()->get('carts');
            
            if(isset($carts[$request->id])){
                $carts[$request->id]['quantity'] = $request->quantity;
                session()->put('carts', $carts);
            }

            session()->flash('success', 'Cart Update Successfully!');
        }
    }

    public function cart_remove(Request $request) {
        
        if($request->id){

            $carts = session()->get('carts');

            if(isset($carts[$request->id])){
                unset($carts[$request->id]);
                session()->put('carts', $carts);
            }

            session()->flash('success', 'Cart Remove Successfully!');
        }
    }

    public function store() {
        return session()->get('carts');
    }
}
