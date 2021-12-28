@extends(Auth::check() ? auth()->user()->role == "User" ? 'user.template' : 'admin.template' : 'guest.template')

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
            <div class="row justify-content-end">
                <form action="/search" class="col-md-4">
                    <div class="input-group mt-4">
                        <input type="search" class="form-control rounded" name="q" id="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
            </div>
        @endif

        <div class="row mt-4">
            @forelse ($furnitures as $f)
                <div class="col-md-3 mt-2">
                    <div class="card" style="background-color: {{PRIMARY_COLOR}};">
                        <a href="/detail/{{$f->id}}"><img class="card-img-top" src="{{Storage::url('images/'.$f->image)}}" alt="{{$f->name}}"></a>
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
                                <a href="{{$user ? '/add-to-cart/'.$f->id : '/login'}}" class="btn btn-light">Add to Cart</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <i class="text-center fs-1 text-muted mt-5">No data</i>
            @endforelse
        </div>
        @if (!empty($furnitures))
            <div class="row mt-4 justify-content-center">
                <nav class="col-md-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="{{$furnitures->previousPageUrl()}}"><< Previous</a></li>
                        <li class="page-item"><a class="page-link" href="{{$furnitures->nextPageUrl()}}">Next >></a></li>
                    </ul>
                </nav>
            </div>
        @endif
    </div>

@endsection
