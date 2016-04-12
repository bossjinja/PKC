<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>
    Petz Kennel Club - @yield('title')
    </title>
        
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Semantic CSS -->
    <link href="{{ asset('Semantic-UI-CSS-master/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Semantic-UI-CSS-master/semantic-sticky-footer.css') }}" rel="stylesheet">
    <script src="{{ asset('Semantic-UI-CSS-master/semantic.min.js') }}"></script>
    
        
    
    </head>
    <body>
    
        <div class="ui fixed inverted medium menu">
            <div class="ui container">
                <a class="header item" href="#">Petz Kennel Club</a>
                @if (Auth::check())
                    <a class="item" href="{{ route('breedlist') }}">Breeds</a>
                    <div class="ui simple dropdown item">Registration
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="header">Register</div>
                            <a class="item" href="{{ route('createprefix') }}">Prefix</a>
                            <a class="item" href="{{ route('regslist') }}">Petz</a>
                            <div class="header">Directory</div>
                            <a class="item" href="{{ route('prefixlist') }}">Prefixes</a>
                            <a class="item" href="{{ route('petzlist') }}">Petz</a>
                            <a class="item" href="{{ route('userlist') }}">Members</a>
                        </div>
                    </div>
                    <a class="item" href="{{ route('logout') }}">Logout</a>
                @else
                    <a class="item" href="{{ route('login') }}">Login</a>
                    <a class="item" href="{{ route('newuser') }}">Join</a>
                @endif
            </div>
        </div>
    
        <!-- Begin page content -->
        <div class="ui main container">
            <h1 class="ui header">@yield('title')</h1>
            
            @yield('content')   
        </div>
    
        <div class="page-footer ui inverted vertical footer segment">
          <div class="ui center aligned container">
            <p class="text-center">&COPY; Petz Kennel Club 1998-2016.</p>
          </div>
        </div>

    </body>
</html>