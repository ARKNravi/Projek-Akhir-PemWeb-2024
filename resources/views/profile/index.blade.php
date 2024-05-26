@extends('template.index')

@section('content')
<div class="container mt-5">
    <h1>Profile</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>Username</th>
            <td>{{ $admin->username }}</td>
        </tr>
        <tr>
            <th>Password</th>
            <td>********</td>
        </tr>
    </table>
    <a href="{{ route('profile.edit-username') }}" class="btn btn-primary">Edit Username</a>
    <a href="{{ route('profile.edit-password') }}" class="btn btn-primary">Change Password</a>
</div>
@endsection
