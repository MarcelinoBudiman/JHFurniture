@extends('user.template')

@section('body')

    <div class="container-fluid col-md-8 mt-4 text-center">
        <h1 class="fs-2 text-center mb-8" style="color: {{PRIMARY_COLOR}};">Checkout</h1>
        @php
            $total = 0;
        @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php
                        $total += ($details['price'] * $details['qty']);
                    @endphp
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-4 mt-2 mr-2">
                            <img style="width: 100%; height: 250px; object-fit: cover;" src="{{Storage::url('images/'.$details['image'])}}" alt="{{$details['name']}}">
                        </div>
                        <div class="col-md-2 mt-2">
                            <h5>{{$details['name']}}</h5>
                        </div>
                        <div class="col-md-2 mt-2">
                            <h5>Rp.{{number_format($details['price'],0,',','.')}}</h5>
                        </div>
                        <div class="col-md-2 mt-2">
                            <h5>{{$details['qty']}}</h5>
                        </div>
                        <div class="col-md-2 mt-2">
                            <h5>Rp.{{$details['qty']*$details['price']}}</h5>
                        </div>
                    </div>
                @endforeach
            @else
                <i class="text-center fs-1 text-muted mt-5">CART IS EMPTY</i>
            @endif
            <h3 class="text-center my-4">Total : Rp.{{number_format($total,0,',','.')}}</h3>
            <form action="/add-to-transaction" class="text-left my-5">
                {{csrf_field()}}
                <div class="form-group row my-4 justify-content-center">
                    <label for="inputPayment" class="col-sm-2">Payment Method</label>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditRadio" value="Credit">
                            <label class="form-check-label" for="creditRadio">Credit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="debitRadio" value="Debit">
                            <label class="form-check-label" for="debitRadio">Debit</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-4 justify-content-center">
                    <label for="inputCard" class="col-sm-2">Card Number</label>
                    <div class="col-sm-4">
                        <input type="number" name="card" id="inputCard" class="form-control" placeholder="Enter your card number">
                    </div>
                </div>
                <div class="form-group row my-4 justify-content-center">
                    <div class="col-sm-10 text-center">
                        <button type="submit" class="btn btn-primary fs-4 px-5" style="background-color: {{PRIMARY_COLOR}}">Checkout</button>
                    </div>
                </div>
            </form>
            <div class="text-center my-4">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <i class="text-danger">{{$error}}</i>
                        <br>
                    @endforeach
                @endif
            </div>
            <div class="text-center my-4">
                @if (session()->has('message'))
                    <i class="text-success">{{session()->get('message')}}</i>
                @endif
            </div>
    </div>

@endsection
