@extends(Auth::check() ? auth()->user()->role == "User" ? 'user.template' : 'admin.template' : 'guest.template')

{{-- @if (auth()->check())
    @extends('user.template')
@else
    @extends('guest.template')
@endif --}}

@php
    $user = auth()->user();
@endphp

@section('body')
    @auth
        @if (auth()->user()->role === "User")
            <div class="container fs-2 text-center mt-2" style="color: {{PRIMARY_COLOR}};">
                <h1>Welcome, {{auth()->user()->name}} to JH Furniture</h1>
            </div>
        @else
            <div class="container fs-2 text-center mt-2" style="color: {{PRIMARY_COLOR}};">
                <h1>Welcome, Admin to JH Furniture</h1>
            </div>
        @endif

    @else
        <div class="container fs-2 text-center mt-2" style="color: {{PRIMARY_COLOR}};">
            <h1>Welcome to JH Furniture</h1>
        </div>
    @endauth

    <div class="row mt-4">
            @forelse ($furnitures as $f)
                <div class="col-md-3 mt-2">
                    <div class="card shadow" style="background-color: {{PRIMARY_COLOR}};">
                        <a href="/detail/{{$f->id}}"><img class="card-img-top" style="width: 100%; object-fit: cover;" src="{{Storage::url('images/'.$f->image)}}" alt="{{$f->name}}"></a>
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">{{$f->name}}</h5>
                            <p class="text-white">Rp.{{number_format($f->price,0,',','.')}}</p>
                            <div class="row justify-content-around">
                                @if ($user!=null && $user->role == 'Admin')
                                    <a href="/update-furniture-page/{{$f->id}}" class="btn btn-success col col-sm-4">Update</a>
                                    <form action="/delete-furniture/{{$f->id}}" method="POST" class="d-inline col col-sm-4">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                @else
                                    <a href="{{$user ? '/add-to-cart/'.$f->id : '/login'}}" class="btn btn-light col col-sm-8" style="color: {{PRIMARY_COLOR}}">Add to Cart</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <i class="text-center fs-1 text-muted mt-5">NO DATA</i>
            @endforelse
        </div>
        <div class="text-center my-4">
            @if (session()->has('message'))
                <i class="text-success">{{session()->get('message')}}</i>
            @endif
        </div>
@endsection




