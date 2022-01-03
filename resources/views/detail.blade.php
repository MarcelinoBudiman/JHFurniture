@php
    $user = auth()->user();
@endphp

@extends(Auth::check() ? auth()->user()->role == "User" ? 'user.template' : 'admin.template' : 'guest.template')

@section('body')

    <div class="container-fluid col-md-8 mt-4">
        <h1 class="fs-2 text-center mb-5" style="color: {{PRIMARY_COLOR}};">{{$furniture->name}}</h1>
        <div class="row justify-content-center mb-5" style="color: {{PRIMARY_COLOR}}">
            <div class="col col-md-4">
                <img style="width: 100%; object-fit: cover;" src="{{Storage::url('images/'.$furniture->image)}}" alt="{{$furniture->name}}">
            </div>
            <div class="col col-md-4">
                <h2 class="fs-4 mt-4">Name : {{$furniture->name}}</h2>
                <h2 class="fs-4 mt-4">Price : Rp.{{number_format($furniture->price,0,',','.')}}</h2>
                <h2 class="fs-4 mt-4">Type : {{$furniture->type}}</h2>
                <h2 class="fs-4 mt-4">Color : {{$furniture->color}}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <a class="btn btn-primary btn-lg text-center mx-3 col-md-2" style="background-color: {{PRIMARY_COLOR}}" href="{{URL::previous()}}">Previous</a>
            @if ($user!=null && $user->role == 'Admin')
                <a class="btn btn-success btn-lg text-center mx-3 col-md-2" href="/update-furniture-page/{{$furniture->id}}">Update</a>
                <form action="/delete-furniture/{{$furniture->id}}" method="POST" class="col-md-2">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <button class="btn text-center btn-danger mx-3 btn-lg col-md-12">Delete</button>
                </form>
            @else
                <a href="{{$user ? '/add-to-cart/'.$furniture->id : '/login'}}" class="btn btn-primary mx-3 btn-lg text-center col-md-2" style="background-color: {{PRIMARY_COLOR}}">Add to Cart</a>
            @endif
        </div>
        <div class="text-center my-4">
            @if (session()->has('message'))
                <i class="text-success">{{session()->get('message')}}</i>
            @endif
        </div>
    </div>

@endsection
