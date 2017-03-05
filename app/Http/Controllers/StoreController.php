<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        $products = Product::all();
        return view ('store.index',compact('products'));
    }

    public function show($slug) {
        $product = Product::where('slug', $slug)->first();
        return view ('store.show',compact('product'));
    }
}
