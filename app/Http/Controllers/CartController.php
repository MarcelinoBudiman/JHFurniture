<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\TransactionDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $cart = session()->get('cart');

        if(!$cart){
            session()->flash('message', "Cart is empty!");
            return redirect()->back();
        }

       $validator = Validator::make($request->all(), [
            'paymentMethod' => 'required',
            'card' => 'numeric|digits:16|required'
       ]);

       if($validator->fails()){
           return back()->withErrors($validator);
        }

        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->transaction_date = date('Y-m-d');
        $transaction->method = $request->paymentMethod;
        $transaction->card_number = $request->card;

        $transaction->save();

        foreach(session('cart') as $id => $content){
            $detail = new TransactionDetail();
            $detail->transaction_id = $transaction->id;
            $detail->furniture_id = $id;
            $detail->quantity = $content['qty'];
            $detail->save();
        }

        session()->forget('cart');
        session()->flash('message', "Checkout successful!");
        return redirect('home');
    }
}
