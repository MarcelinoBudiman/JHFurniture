@extends($user->role == "User" ? 'user.template' : 'admin.template')

@section('body')
    @if ($user->role === "User")

        <div class="container fs-2 text-center mt-2" style="color: #6f42c1;">
            <h1>{{$user->name}}'s Profile</h1>
        </div>

        <div class="container fw-bolder col-md-8 ms-6 mx-auto mt-4">

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-4 fs-6">
                    Full Name
                </div>
                <div class="col-md-6 fs-6">
                    {{$user->name}}
                </div>
            </div>

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-4 fs-6">
                    Email
                </div>
                <div class="col-md-6 fs-6">
                    {{$user->email}}
                </div>
            </div>

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-4 fs-6">
                    Address
                </div>
                <div class="col-md-6 fs-6">
                    {{$user->address}}
                </div>
            </div>

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-4 fs-6">
                    Gender
                </div>
                <div class="col-md-6 fs-6">
                    {{$user->gender}}
                </div>
            </div>

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-4 fs-6">
                    Role
                </div>
                <div class="col-md-6 fs-6">
                    {{$user->role}}
                </div>
            </div>

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-2"></div>
                <div class="col-md-2 fs-6">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="text-light btn rounded-pill" style="background-color: #6f42c1;" type="submit">Logout</button>
                    </form>
                </div>
                <div class="col-md-4 fs-6">
                    <a class="text-light btn rounded-pill" style="background-color: #6f42c1;"  href="/detail-transaction/{{$user->id}}">View Transaction History</a>
                </div>
                <div class="col-md-4 fs-6">
                    <a class="text-light btn rounded-pill" style="background-color: #6f42c1;"  href="/update-profile/{{$user->id}}">Update</a>
                </div>
            </div>

        </div>

    @else

        <div class="container fs-2 text-center mt-2" style="color: #6f42c1;">
            <h1>Admin's Profile</h1>
        </div>

        <div class="container fw-bolder col-md-8 ms-6 mx-auto mt-4">

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-4 fs-6">
                    Full Name
                </div>
                <div class="col-md-6 fs-6">
                    {{$user->name}}
                </div>
            </div>

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-4 fs-6">
                    Email
                </div>
                <div class="col-md-6 fs-6">
                    {{$user->email}}
                </div>
            </div>

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-4 fs-6">
                    Role
                </div>
                <div class="col-md-6 fs-6">
                    {{$user->role}}
                </div>
            </div>

            <div class="row mb-3 d-flex justify-content-center flex-nowrap">
                <div class="col-md-2"></div>
                <div class="col-md-2 fs-6">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="text-light btn rounded-pill" style="background-color: #6f42c1;" type="submit">Logout</button>
                    </form>
                </div>
                <div class="col-md-4 fs-6">
                    <a class="text-light btn rounded-pill" style="background-color: #6f42c1;"  href="/detail-transaction/{{$user->id}}">View All User's Transaction</a>
                </div>
                <div class="col-md-4 fs-6">
                    <a class="text-light btn rounded-pill" style="background-color: #6f42c1;"  href="/update-profile/{{$user->id}}">Update</a>
                </div>
            </div>

        </div>
    @endif
@endsection




