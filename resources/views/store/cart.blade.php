@extends('store.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @if (count($cart))
                    <p>
                        <a href="{{route('cart-trash')}}" class="btn btn-danger">
                            Buidar Cistella <i class="fa fa-trash"></i>
                        </a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Imatge</th>
                                <th>Producte</th>
                                <th>Preu</th>
                                <th>Quantitat</th>
                                <th>Subtotal</th>
                                <th>Treure</th>
                            </tr>
                            </thead>
                            @foreach($cart as $product)
                                <tr>
                                    <td><img src="{{ $product->image }}"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price,2) }}€</td>
                                    <td>
                                        <input
                                                type="number"
                                                min="1"
                                                max="100"
                                                value="{{ $product->quantity }}"
                                                id ="product_{{$product->id}}"
                                        >
                                        <a
                                                href="#"
                                                class="btn btn-warning btn-update-item"
                                                data-href="{{ route('cart-update', $product->slug) }}"
                                                data-id = "{{ $product->id }}"
                                        >
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </td>
                                    <td>{{ number_format($product->price * $product->quantity,2) }} €</td>
                                    <td>
                                        <a href="{{route('cart-delete', $product->slug)}}" class="btn btn-danger">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <h3>
                            <span class="label label-success">
                                Total: {{ number_format($total, 2) }} €
                            </span>
                        </h3>
                        <a href="{{route('home')}}" class="btn btn-primary">
                            <i class="fa fa-chevron-circle-left"></i> Seguir comprant
                        </a>
                        <a href="{{route('order-detail')}}" class="btn btn-primary">
                            <i class="fa fa-chevron-circle-right"></i> Continuar
                        </a>
                    </div>
                @else
                    <h3><span class="label label-danger">La cistella està buida</span></h3>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(".btn-update-item").on('click', function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var href = $(this).data('href');
            var quantity = $("#product_" + id).val();
            window.location.href = href + "/" + quantity;
        });
    </script>
@endsection
