@extends('template')
@section('body')


<div class="container-fluid col-md-8 mt-4">
    <h1 class="fs-2 text-center" style="color: #6f42c1;">{{ __('Login') }}</h1>
<form class="mt-3">
  <div class="row mb-3">
    <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
    <div class="col-md-6">
        <input type="email" class="form-control" id="Email" placeholder="Enter your email" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="Password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    <div class="col-md-6">
        <input type="password" class="form-control" id="Password" placeholder="Enter your password" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <input type="checkbox" class="form-check-input" id="Remember">
        <label class="form-check-label" for="Remember">{{ __('Remember Me') }}</label>
    </div>
  </div>

  <div class="row mb-3">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="col-md-5 btn rounded-pill text-light" style="background-color: #6f42c1;">{{ __('Login') }}</button>
        </div>
    </div>

</form>
</div>


@endsection
