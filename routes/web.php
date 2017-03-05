<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('home')->get('/', 'StoreController@index');
Route::name('product-detail')->get('/product/{slug}', 'StoreController@show');

Route::bind('product',function($slug){
    return App\Product::where('slug',$slug)->first();
});

Route::middleware('auth')->prefix('cart')->group(function() {
    Route::name('cart-show')->get('/', 'CartController@show');
    Route::name('cart-add')->get('/add/{product}', 'CartController@add');
    Route::name('cart-delete')->get('/delete/{product}', 'CartController@delete');
    Route::name('cart-trash')->get('/trash', 'CartController@trash');
    Route::name('cart-update')->get('/update/{product}/{quantity?}', 'CartController@update');
});

Route::middleware('auth')->name('order-detail')->get('/order-detail', 'CartController@OrderDetail');


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');