@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li><a href="#">Home</a></li>
          <li><a href="#">Breeds</a></li>
        </ul>
      </div>
      <div class="col-md-9">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif

        <ul>
          @foreach ($breeds as $breed)
            <li><a href="{{ $breed->standard_url }}">{{ $breed->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

@endsection
