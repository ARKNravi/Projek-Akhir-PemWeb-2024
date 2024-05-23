<!-- admin/login.blade.php -->
<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    @if($errors->has('loginError'))
        <div>{{ $errors->first('loginError') }}</div>
    @endif
    <input type="text" name="userName" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
