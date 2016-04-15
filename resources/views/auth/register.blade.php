@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')


<div class="ui center aligned middle aligned grid">
    <div class="column six wide">
        <h2 class="ui header">
            <div class="content">Join PKC</div>
        </h2>

        <form method="POST" action="{{ route('newuser') }}" class="ui large form">
            {!! csrf_field() !!}
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                    </div>
                </div>
            
                <div class="field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    </div>
                </div>
            
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                </div>
            
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                </div>
            
                <button type="submit" class="ui fluid large teal submit button">Join</button>
            </div>
        </form>
    </div>
</div>

@endsection