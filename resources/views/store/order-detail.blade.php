@extends('store.template')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="page-header">
                <h1><i class="fa fa-shopping-card"></i> Detall de la comanda</h1>
            </div>
            <div class="page">
                <div class="table-responsive">
                    <h1>Dades d'usuari</h1>
                    <table class="table table-striped table-hover table-bordered">
                        <tr><td>Nom:</td><td>{{ Auth::user()->name . " " . Auth::user()->last_name }}</td></tr>
                        <tr><td>Correu:</td><td>{{ Auth::user()->email }}</td></tr>
                        <tr><td>Adreça:</td><td>{{ Auth::user()->adress }}</td></tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <h1>Dades de la comanda</h1>
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <th>Producte</th>
                            <th>Preu</th>
                            <th>Quantitat</th>
                            <th>Subtotal</th>
                        </tr>
                        @foreach($cart as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price,2) }}€</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ number_format($product->price * $product->quantity,2) }} €</td>
                            </tr>
                        @endforeach
                    </table>
                    <h3>
                        <span class="label label-success">
                        Total: {{ number_format($total, 2) }}€
                        </span>
                    </h3>
                    <p>
                        <a href="{{ route('cart-show') }}" class="btn btn-primary">
                            <i class="fa fa-chevron-circle-left"></i> Tornar
                        </a>

                        <a href="{{route('payment')}}" class="btn btn-warning">
                            Pagar amb <i class="fa fa-cc-paypal"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection