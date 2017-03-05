@extends('store.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
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
                                <td> {{ $product->quantity }} </td>
                                <td>{{ number_format($product->price * $product->quantity,2) }} €</td>
                                <td>
                                    <a href="#" class="btn btn-danger">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection