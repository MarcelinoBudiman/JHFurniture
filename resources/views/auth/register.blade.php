@extends('guest.template')
@section('body')


<div class="container-fluid col-md-8 mt-4">
    <h1 class="fs-2 text-center" style="color: #6f42c1;">{{ __('Register') }}</h1>
<form class="mt-3" action="/register" method="POST">
    @csrf

    <div class="row mb-1">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
        <div class="col-md-6">
            <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Enter your full name" required>
        </div>

        @error('name')
            <div class="col-md-6 offset-md-4 fs-6" style="color: red">
                {{ ($message) }}
            </div>
        @enderror

    </div>


    <div class="row mb-1">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
        <div class="col-md-6">
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email" required>
        </div>

        @error('email')
            <div class="col-md-6 offset-md-4 fs-6" style="color: red">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="row mb-1">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        <div class="col-md-6">
            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required>
        </div>

        @error('password')
            <div class="col-md-6 offset-md-4 fs-6" style="color: red">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="row mb-3">
        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
        <div class="col-md-6">
            <textarea class="form-control  @error('address') is-invalid @enderror" name="address" id="address" rows="3" placeholder="Enter your address" required>{{ old('address') }}</textarea>
        </div>

        @error('address')
            <div class="col-md-6 offset-md-4 fs-6" style="color: red">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="row mb-3">
        <label for="gender" class="col-md-4 form-check-label text-md-right">{{ __('Gender') }}</label>
        <div class="col-md-auto">
            <input id="male" type="radio" class="form-check-input " name="gender" value="Male" required>
        </div>
        <label for="male" class="col-md-2 form-check-label text-md-right">{{ __('Male') }}</label>
        <div class="col-md-auto">
            <input id="female" type="radio" class="col-md-2 form-check-input" name="gender" value="Female">
        </div>
        <label for="female" class="col-md-2 form-check-label text-md-right">{{ __('Female') }}</label>
    </div>

    <div class="row mb-1">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="col-md-5 btn rounded-pill text-light" style="background-color: #6f42c1;">{{ __('Register') }}</button>
        </div>
    </div>


</form>
</div>


@endsection
