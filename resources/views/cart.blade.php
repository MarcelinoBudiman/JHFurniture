@extends('user.template')

@section('body')

    <div class="container-fluid col-md-8 mt-4 text-center">
        <h1 class="fs-2 text-center mb-8" style="color: {{PRIMARY_COLOR}};">Cart</h1>
        @php
            $total = 0;
        @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php
                        $total += ($details['price'] * $details['qty']);
                    @endphp
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-2 mt-2 mr-2">
                            <img src="{{Storage::url('images/'.$details['image'])}}" alt="{{$details['name']}}">
                        </div>
                        <div class="col-md-2 mt-2">
                            <h5>{{$details['name']}}</h5>
                        </div>
                        <div class="col-md-2 mt-2">
                            <h5>Rp.{{$details['price']}}</h5>
                        </div>
                        <div class="col-md-2 mt-2">
                            <h5>{{$details['qty']}}</h5>
                        </div>
                        <div class="col-md-2 mt-2">
                            <h5>Rp.{{$details['qty']*$details['price']}}</h5>
                        </div>
                        <div class="col-md-2 mt-2">
                            <a href="/reduce-cart/{{$id}}" class="btn btn-danger">-</a>
                            <a href="/add-to-cart/{{$id}}" class="btn btn-success">+</a>
                        </div>
                    </div>
                @endforeach
            @else
                <i class="text-center fs-1 text-muted mt-5">CART IS EMPTY</i>
            @endif
            <h3 class="text-center mt-3">Total : Rp.{{$total}}</h3>
            <a href="/checkout" class="btn btn-primary mt-3 mb-5">Proceed to Checkout</a>
    </div>

@endsection
