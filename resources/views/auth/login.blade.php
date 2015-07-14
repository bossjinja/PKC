<form method="POST" action="{{ route('login') }}">
    {!! csrf_field() !!}

    <div>
        Username
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>