@extends('layouts.master')

@section('title', 'Breeds')

@section('content')

  This is a list of all breeds.
  <br><br>
  Dogz
  @foreach ($dogbreeds as $dogbreed)
    <br><a href="{{ route('showbreed', [$dogbreed->breed_id]) }}">{{ $dogbreed->breedname }}</a> - {{ $dogbreed->breedgroup->groupname }}
  @endforeach
  <br><Br>
  Catz
  @foreach ($catbreeds as $catbreed)
    <br><a href="{{ route('showbreed', [$catbreed->breed_id]) }}">{{ $catbreed->breedname }}</a> - {{ $catbreed->breedgroup->groupname }}
  @endforeach
@endsection