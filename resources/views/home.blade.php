@extends(Auth::check() ? auth()->user()->role == "User" ? 'user.template' : 'admin.template' : 'guest.template')

{{-- @if (auth()->check())
    @extends('user.template')
@else
    @extends('guest.template')
@endif --}}


@section('body')
    @auth
        @if (auth()->user()->role === "User")
            <div class="container fs-2 text-center mt-2" style="color: #6f42c1;">
                <h1>Welcome, {{auth()->user()->name}} to JH Furniture</h1>
            </div>
        @else
            <div class="container fs-2 text-center mt-2" style="color: #6f42c1;">
                <h1>Welcome, Admin to JH Furniture</h1>
            </div>
        @endif

    @else
        <div class="container fs-2 text-center mt-2" style="color: #6f42c1;">
            <h1>Welcome to JH Furniture</h1>
        </div>
    @endauth
@endsection




