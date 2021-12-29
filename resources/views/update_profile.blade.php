@extends($user->role == "User" ? 'user.template' : 'admin.template')

@section('body')
    @if ($user->role === "User")

        <div class="container-fluid col-md-8 mt-4">
            <h1 class="fs-2 text-center" style="color: #6f42c1;">Update Profile</h1>

            <form class="mt-3" action="/update-profile-user/{{$user->id}}" method="POST">
                @csrf
                <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Enter your full name" autofocus required>
                </div>
                @error('name')
                    <div class="col-md-6 offset-md-4 fs-6" style="color: red">
                            {{ $message }}
                        </div>
                @enderror
            </div>

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
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="col-md-5 btn rounded-pill text-light" style="background-color: #6f42c1;">{{ __('Update Profile') }}</button>
                    </div>
                </div>

            </form>
        </div>


    @else

        <div class="container-fluid col-md-8 mt-4">
            <h1 class="fs-2 text-center" style="color: #6f42c1;">Update Profile</h1>
            @if (session()->has('updateError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('updateError') }}
                </div>
            @endif

            <form class="mt-3" action="/update-profile-admin/{{$user->id}}" method="POST">
                @csrf
                <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Enter your full name" autofocus required>
                </div>
                @error('name')
                    <div class="col-md-6 offset-md-4 fs-6" style="color: red">
                            {{ $message }}
                        </div>
                @enderror
            </div>

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
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                </div>
                @error('password')
                    <div class="col-md-6 offset-md-4 fs-6" style="color: red">
                            {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="col-md-5 btn rounded-pill text-light" style="background-color: #6f42c1;">{{ __('Update Profile') }}</button>
                </div>
            </div>

            </form>
        </div>
    @endif
@endsection




