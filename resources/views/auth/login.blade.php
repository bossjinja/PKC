@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="ui center aligned middle aligned grid">
    <div class="column six wide">
        <h2 class="ui header">
            <div class="content">Log in to PKC</div>
        </h2>
        
        <form method="POST" action="{{ route('login') }}" class="ui large form">
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
                        <i class="lock icon"></i>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui checkbox">
                      <input class="hidden" tabindex="0" type="checkbox" name="remember">
                      <label>Remember Me</label>
                    </div>
                  </div>
                <button type="submit" class="ui fluid large teal submit button">Log In</div>
                <div class="ui message">
                    Don't have an account? <a href="{{ route('newuser') }}">Join PKC.</a>
                </div>
            </div>
        </form>
        
    </div>
</div>


<script>
    $('.ui.checkbox').checkbox();
</script>

@endsection