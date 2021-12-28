<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function createCartPage(){
        return view('cart');
    }

    public function createCheckoutPage(){
        return view('checkout');
    }

    public function addToCart($id){
        $furniture = Furniture::find($id);

        if(!$furniture){
            return redirect()->back();
        }

        //get session
        $cart = session()->get('cart');

        //if session doesnt exist, create
        if(!$cart){
            $cart = [
                $id => [
                    'name' => $furniture->name,
                    'qty' => 1,
                    'price' => $furniture->price,
                    'image' => $furniture->image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Furniture added to cart!');
        }

        //if session exist and furniture exist in cart
        if(isset($cart[$id])){
            $cart[$id]['qty']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Furniture added to cart!');
        }

        //if furniture doesnt exist in cart
        $cart[$id] = [
            'name' => $furniture->name,
            'qty' => 1,
            'price' => $furniture->price,
            'image' => $furniture->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Furniture added to cart!');
    }

    public function reduceQty($id){
        $cart = session()->get('cart');

        if(!$cart){
            return redirect()->back();
        }

        if(isset($cart[$id])){
            if($cart[$id]['qty'] > 1){
                $cart[$id]['qty']--;
            }
            else{
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function insertTransaction(Request $request){
       
    }
}
