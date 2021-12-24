@extends(Auth::check() ? 'user.template' : 'guest.template')

{{-- @if (auth()->check())
    @extends('user.template')
@else
    @extends('guest.template')
@endif --}}

@section('body')
    <div class="container">
        {{auth()->user()->name}}
    </div>
@endsection




