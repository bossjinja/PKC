@extends('layouts.master')

@section('title', 'Login')

@section('content')

<h2>Login</h2>

<form method="POST" action="{{ route('login') }}" class="form-inline">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="name" class="sr-only">Username</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Username">
    </div>

    <div class="form-group">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>
    </div>

        <button type="submit" class="btn btn-default">Login</button>
</form>
@endsection