@extends($user->role == "User" ? 'user.template' : 'admin.template')
@php
    $user = auth()->user();
@endphp
@section('body')

    @if ($user->role === "User")
        <div class="container-fluid mt-3 mb-2">
            <h1 class="fs-2 mb-4 text-center" style="color: {{PRIMARY_COLOR}};">Transaction History</h1>

            @foreach ($transaction as $t)
            {{-- FOREACH TRANSACTION ID --}}
            <div class="container-fluid border mb-2" style="border-color: 30px {{PRIMARY_COLOR}};">
                <p class="mt-3 fs-5 fw-bold">Transaction Id: 1</p>
                <p class=" fs-6">Transaction Date: 02/01/2022</p>
                <p class=" fs-6">Method: Debit</p>
                <p class="mb-1 fs-6">Card Number: 1234567890123456</p>


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
                        @foreach ($transaction->details->furniture as $furniture)
                        <tr>
                            <td>{{$furniture->name}}</td>
                            <td>{{$furniture->price}}</td>
                            <td>{{$furniture->quantity}}</td>
                        </tr>
                        @endforeach
                        {{-- TOTAL PRICE --}}
                        <tr>
                            <td colspan="3">Total Price</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @endforeach
        </div>
    @else

    @endif

@endsection
