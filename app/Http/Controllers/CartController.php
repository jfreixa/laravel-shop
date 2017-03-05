<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function __construct()
    {
        if (!Session::has('cart')) {
            Session::put('cart', []);
        }
    }

    public function show()
    {
        $cart = Session::get('cart');
        $total = $this->total();

        return view('store.cart', compact('cart', 'total'));
    }

    private function total()
    {
        $cart = Session::get('cart');
        return collect($cart)->reduce(function($total, Product $product) {
            return $product->price * $product->quantity;
        }, 0);
    }

    public function add(Product $product)
    {
        $cart = Session::get('cart');
        $product->quantity = 1;
        $cart[$product->slug] = $product;
        Session::put('cart', $cart);
        return redirect()->route('cart-show');
    }

    public function delete (Product $product) {
        $cart = Session::get('cart');
        unset($cart[$product->slug]);
        Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    public function trash () {
        Session::forget('cart');

        return redirect()->route('cart-show');
    }

    public function update (Product $product,$quantity = 1){
        $cart=Session::get('cart');
        $cart[$product->slug]->quantity = $quantity;
        Session::put('cart',$cart);

        return redirect()->route('cart-show');
    }

    public function OrderDetail(){
        if (count(\Session::get('cart'))<=0)
            return redirect()->route('home');
        else{
            $cart=\Session::get('cart');
            $total=$this->total();
            return view ('store.order-detail',compact('cart','total'));
        }
    }
}
