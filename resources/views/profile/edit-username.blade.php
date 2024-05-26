@extends('template.index')

@section('content')
<div class="container mt-5">
    <h1>Edit Username</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('profile.update-username') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ $admin->username }}" required>
        </div>
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Username</button>
    </form>
</div>
@endsection
