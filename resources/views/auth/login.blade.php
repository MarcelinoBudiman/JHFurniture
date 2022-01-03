@extends('guest.template')
@section('body')



<div class="container-fluid col-md-8 mt-4">
    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
    </div>
    @endif

    <h1 class="fs-2 text-center" style="color: {{PRIMARY_COLOR}};">{{ __('Login') }}</h1>

<form class="mt-3" action="/login" method="POST">
    @csrf
    <div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
    <div class="col-md-6">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="Enter your email" autofocus required>
    </div>
    @error('email')
        <div class="col-md-6 offset-md-4 fs-6" style="color: red">
                {{ $message }}
            </div>
    @enderror
  </div>

  <div class="row mb-3">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    <div class="col-md-6">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <input type="checkbox" name="remember" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
    </div>
  </div>

  <div class="row mb-3">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="col-md-5 btn rounded-pill text-light" style="background-color: {{PRIMARY_COLOR}};">{{ __('Login') }}</button>
        </div>
    </div>

</form>
</div>


@endsection
