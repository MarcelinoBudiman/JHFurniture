@extends(Auth::check() ? 'user.template' : 'guest.template')

@php
    $user = auth()->user();
@endphp

@section('body')
    {{-- <div class="container">
        {{auth()->user()->name}}
    </div> --}}

    <div class="container-fluid col-md-8 mt-4">
        @if (!Auth::check())
            <h1 class="fs-2 text-center mb-8" style="color: {{PRIMARY_COLOR}};">Welcome to JH Furniture</h1>
        @elseif ($user->role == 'User')
            <h1 class="fs-2 text-center" style="color: {{PRIMARY_COLOR}};">Welcome, {{$user->name}} <br> to JH Furniture</h1>
        @elseif ($user->role == 'Admin')
            <h1 class="fs-2 text-center" style="color: {{PRIMARY_COLOR}};">{{ __('View Furniture') }}</h1>
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">Search</button>
            </div>
        @endif

        <div class="row">
            @forelse ($furnitures as $f)
                <div class="col-md-3 mt-2">
                    <div class="card" style="background-color: {{PRIMARY_COLOR}};">
                        <img class="card-img-top" src="{{Storage::url('images/'.$f->image)}}" alt="{{$f->name}}">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">{{$f->name}}</h5>
                            <p class="text-white">Rp.{{$f->price}}</p>
                            @if ($user!=null && $user->role == 'Admin')
                                <a href="/update-furniture-page/{{$f->id}}" class="btn btn-success">Update</a>
                                <form action="/delete-furniture/{{$f->id}}" method="POST" class="d-inline">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            @else
                                <a href="#" class="btn btn-light">Add to Cart</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div>No data</div>
            @endforelse
        </div>

    </div>

@endsection
