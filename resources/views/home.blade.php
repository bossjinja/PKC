<p>Welcome to Petz Kennel Club!</p>

@if (Auth::check())
  <a href="{{ route('logout') }}">Logout</a>
@else
  <a href="{{ route('login') }}">Login</a> - <a href="{{ route('newuser') }}">Sign Up</a>
@endif