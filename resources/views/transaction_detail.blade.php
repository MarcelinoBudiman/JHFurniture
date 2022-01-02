@extends($user->role == "User" ? 'user.template' : 'admin.template')
@php
    $user = auth()->user();
@endphp
@section('body')

    @if ($user->role === "User")
    {{-- USER --}}
        <div class="container-fluid mt-3 mb-2">
            <h1 class="fs-2 mb-4 text-center" style="color: {{PRIMARY_COLOR}};">Transaction History</h1>

            @foreach ($transaction as $t)
            {{-- FOREACH TRANSACTION ID --}}
            @php
                $total = 0;
            @endphp
            <div class="container-fluid border mb-2" style="border-color: 30px {{PRIMARY_COLOR}};">
                <p class="mt-3 fs-5 fw-bold">Transaction Id: {{$t->id}}</p>
                <p class=" fs-6">Transaction Date: {{$t->transaction_date}}</p>
                <p class=" fs-6">Method: {{$t->method}}</p>
                <p class="mb-1 fs-6">Card Number: {{$t->card_number}}</p>


                <table class="table table-sm table-bordered text-center" style="border-color: {{PRIMARY_COLOR}};">
                    <thead>
                        <tr>
                            <th scope="col">Furniture's Name</th>
                            <th scope="col">Furniture's Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price For Each Furniture</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($t->details->furniture_id as $furniture)
                        @php
                            $total += ($furniture->price * $t->details->quantity);
                        @endphp
                        <tr>
                            <td>{{$furniture->name}}</td>
                            <td>{{$furniture->price}}</td>
                            <td>{{$t->details->quantity}}</td>
                        </tr>
                        @endforeach
                        {{-- TOTAL PRICE --}}
                        <tr>
                            <td colspan="3">Total Price</td>
                            <td>Rp.{{number_format($total,0,',','.')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @endforeach
        </div>
    @else
        {{-- ADMIN --}}
        <div class="container-fluid mt-3 mb-2">
            <h1 class="fs-2 mb-4 text-center" style="color: {{PRIMARY_COLOR}};">Transaction History</h1>

            @foreach ($transactions as $t)
            {{-- FOREACH TRANSACTION ID --}}
            @php
                $total = 0;
            @endphp
            <div class="container-fluid border mb-2" style="border-color: 30px {{PRIMARY_COLOR}};">
                <p class="mt-3 fs-5 fw-bold">Transaction Id: {{$t->id}}</p>
                <p class=" fs-6">Transaction Date: {{$t->date}}</p>
                <p class=" fs-6">Method: {{$t->method}}</p>
                <p class="mb-1 fs-6">Card Number: {{$t->card_number}}</p>
                <p class=" fs-6">User's Name: {{$t->user->name}}</p>


                <table class="table table-sm table-bordered text-center" style="border-color: {{PRIMARY_COLOR}};">
                    <thead>
                        <tr>
                            <th scope="col">Furniture's Name</th>
                            <th scope="col">Furniture's Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price For Each Furniture</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($t->details->furniture as $furniture)
                        @php
                            $total += ($furniture->price * $t->details->quantity);
                        @endphp
                        <tr>
                            <td>{{$furniture->name}}</td>
                            <td>{{$furniture->price}}</td>
                            <td>{{$t->details->quantity}}</td>
                        </tr>
                        @endforeach
                        {{-- TOTAL PRICE --}}
                        <tr>
                            <td colspan="3">Total Price</td>
                            <td>Rp.{{number_format($total,0,',','.')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @endforeach
        </div>

    @endif

@endsection
