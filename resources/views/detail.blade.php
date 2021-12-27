@php
    $user = auth()->user();
@endphp

@extends(Auth::check() ? 'admin.template' : 'guest.template')

@section('body')

    <div class="container-fluid col-md-8 mt-4">
        <h1 class="fs-2 text-center mb-12" style="color: {{PRIMARY_COLOR}};">{{$furniture->name}}</h1>
        <div class="row justify-content-center">
            <div class="col col-md-4">
                <img src="{{Storage::url('images/'.$furniture->image)}}" alt="{{$furniture->name}}">
            </div>
            <div class="col col-md-4">
                <h2 class="fs-4 mt-4">Name : {{$furniture->name}}</h2>
                <h2 class="fs-4 mt-4">Price : Rp.{{$furniture->price}}</h2>
                <h2 class="fs-4 mt-4">Type : {{$furniture->type}}</h2>
                <h2 class="fs-4 mt-4">Color : {{$furniture->color}}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-2">
                <a class="btn btn-primary" href="{{URL::previous()}}">Previous</a>
            </div>
            @if ($user!=null && $user->role == 'Admin')
                <div class="col col-md-2">
                    <a class="btn btn-success" href="/update-furniture-page/{{$furniture->id}}">Update</a>
                </div>
                <div class="col col-md-2">
                    <form action="/delete-furniture/{{$furniture->id}}" method="POST">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @else
                <div class="col col-md-2">
                    <a class="btn btn-primary" href="#">Add To Cart</a>
                </div>
            @endif
        </div>
    </div>

@endsection
