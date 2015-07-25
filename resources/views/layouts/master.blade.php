<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Petz Kennel Club - @yield('title')</title>
        <link href="{{ asset('bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
          <div class="row">
            @section('sidebar')
              <div class="col-md-4">
                @if (Auth::check())
                  <a href="{{ route('breedlist') }}">Breeds</a><br><br>
                
                  <a href="{{ route('logout') }}">Logout</a>
                @else
                  <a href="{{ route('login') }}">Login</a> - <a href="{{ route('newuser') }}">Sign Up</a>
                @endif
              </div>
            @show
    
            <div class="col-md-8">
                @yield('content')
            </div>
          </div>
        </div>
    </body>
</html>