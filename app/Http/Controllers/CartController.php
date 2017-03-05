<?php

namespace App\Http\Controllers;

use App\Product;
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
        return view('store.cart', compact('cart'));
    }

    public function add(Product $product)
    {
        $cart = Session::get('cart');
        $product->quantity = 1;
        $cart[$product->slug] = $product;
        Session::put('cart', $cart);
        return redirect()->route('cart-show');
    }
}
