@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')

<h2>Sign Up</h2>

<form method="POST" action="{{ route('newuser') }}">
    {!! csrf_field() !!}

    <div class="col-md-6 form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
    </div>

    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="col-md-6 form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>

@endsection