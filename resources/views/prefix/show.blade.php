@extends('layouts.master')

@section('title', 'Prefix')

@section('content')

  Prefix
  
  <p>{{ $prefix->prefix }}</p>
  <p>Display: {{ $prefix->display }}</p>
  <p>Prefix possessive {{ $prefix->prefix_possessive }}</p>
  <p>Suffix possessive {{ $prefix->suffix_possessive }}</p>
  <p>Owners:
    @foreach ($prefix->users as $user)
      {{ $user->name }},
    @endforeach
  </p>

@endsection