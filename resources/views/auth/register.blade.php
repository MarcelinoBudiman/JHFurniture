@extends('template')
@section('body')


<div class="container-fluid col-md-8 mt-4">
    <h1 class="fs-2 text-center" style="color: #6f42c1;">{{ __('Register') }}</h1>
<form class="mt-3">

    <div class="row mb-3">
        <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
        <div class="col-md-6">
            <input type="email" class="form-control" id="Email" placeholder="Enter your full name">
        </div>
    </div>

    <div class="row mb-3">
        <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
        <div class="col-md-6">
            <input type="email" class="form-control" id="Email" placeholder="Enter your email">
        </div>
    </div>

    <div class="row mb-3">
        <label for="Password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        <div class="col-md-6">
            <input type="password" class="form-control" id="Password" placeholder="Enter your password">
        </div>
    </div>

    <div class="row mb-3">
        <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
        <div class="col-md-6">
            <input type="email" class="form-control" id="Email" placeholder="Enter your address">
        </div>
    </div>

    <div class="row mb-3">
        <label for="gender" class="col-md-4 form-check-label text-md-right">{{ __('Gender') }}</label>
        <div class="col-md-auto">
            <input id="male" type="radio" class="form-check-input" name="gender" value="Male">
        </div>
        <label for="male" class="col-md-2 form-check-label text-md-right">{{ __('Male') }}</label>
        <div class="col-md-auto">
            <input id="female" type="radio" class="col-md-2 form-check-input" name="gender" value="Female">
        </div>
        <label for="female" class="col-md-2 form-check-label text-md-right">{{ __('Female') }}</label>
    </div>

    <div class="row mb-3">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="col-md-5 btn rounded-pill text-light" style="background-color: #6f42c1;">{{ __('Register') }}</button>
        </div>
    </div>


</form>
</div>


@endsection
