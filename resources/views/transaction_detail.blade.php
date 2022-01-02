@extends($user->role == "User" ? 'user.template' : 'admin.template')
@section('body')

    @if ($user->role === "User")

    @else

    @endif

@endsection
