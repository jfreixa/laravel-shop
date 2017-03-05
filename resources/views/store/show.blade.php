@extends('store.template')

@section('content')

    <h1>Detall del producte</h1>
    <a href="{{route('home')}}">Home</a>
    <div class="product-block">
        <img src="{{$product->image}}" alt="">
    </div>
    <div class="product-block">
        <h3>{{$product->name}}</h3>
        <div class="product-info">
            <p>{{$product->extract}}</p>
            <p>Preu: {{number_format($product->price, 2)}}</p>
            <p>
                <a href="{{route('cart-add', $product->slug)}}">Comprar</a>
            </p>
        </div>
    </div>

@endsection