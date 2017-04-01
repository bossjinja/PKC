@extends('layouts.master')

@section('title', 'Prefix')

@section('content')

  Prefix
  
  <p>{{ $prefix->prefix }}</p>
  <p>Prefix: {{ $prefix->prefix }}</p>
  <p>Prefix possessive: {{ $prefix->prefix_possessive }}</p>
  <p>Suffix possessive: {{ $prefix->suffix_possessive }}</p>
  <p>Owners:
    @foreach ($prefix->users as $user)
      <a href="{{ route('showuser', $user->name) }}" class="ui label">{{ $user->name }}</a>
    @endforeach
  </p>

@endsection