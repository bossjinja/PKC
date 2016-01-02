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

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('bootstrap/bootstrap-3.3.5-dist/css/sticky-footer-navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/bootstrap-3.3.5-dist/css/custom.css') }}" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    </head>
    <body>
    
    
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Petz Kennel Club</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
           @if (Auth::check())
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="{{ route('breedlist') }}">Breeds</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registration <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Register</li>
                <li><a href="{{ route('createprefix') }}">Prefix</a></li>
                <li><a href="{{ route('regslist') }}">Petz</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Directory</li>
                <li><a href="{{ route('prefixlist') }}">Prefixes</a></li>
                <li><a href="{{ route('petzlist') }}">Petz</a></li>
                <li><a href="{{ route('userlist') }}">Members</a></li>
              </ul>
            </li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="{{ route('newuser') }}">Join</a></li>
            @endif    
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>
        @yield('title')
        </h1>
      </div>
      @yield('content')
        
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-center">&COPY; Petz Kennel Club 1998-2015.</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('bootstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('bootstrap/bootstrap-3.3.5-dist/js/ie10-viewport-bug-workaround.js') }}"></script>  
    </body>
</html>