@extends('store.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <section class="products">
                    @foreach($products as $product)
                        <article class="white-panel">
                            <img src="{{$product->image}}" alt="{{$product->name}}">
                            <h2>{{$product->name}}</h2>
                            <p>{{$product->extract}}</p>
                            <h3 class="text-right">Preu: {{number_format($product->price, 2)}} €</h3>
                            <p class="text-right">
                                <a class="btn btn-primary" href="{{route('cart-add', $product->slug)}}">
                                    Comprar
                                </a>
                                <a class="btn btn-default" href="{{route('product-detail', $product->slug)}}">Detall</a>
                            </p>
                        </article>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('js/pinterest_grid.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.products').pinterest_grid({
                no_columns: 4,
                padding_x: 10,
                padding_y: 10,
                margin_bottom: 50,
                single_column_breakpoint: 700
            });
        });
    </script>
@endsection