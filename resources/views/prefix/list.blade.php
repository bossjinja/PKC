@extends('layouts.master')

@section('title', 'Prefixes')

@section('content')
  
  <h1>Prefixes</h1>

  <table class="ui celled table">
    <thead>
      <tr><th>Prefix</th><th>Owner(s)</th></tr>
    </thead>
    <tbody>
  @foreach ($prefixes as $prefix)
    <tr>
      <td><a href="{{ route('showprefix', $prefix->id) }}">{{ $prefix->prefix }}</a></td>
      <td>
        @foreach ($prefix->users as $user)
          <a href="{{ route('showuser', $user->name) }}" class="ui label">{{ $user->name}}</a>
        @endforeach
      </td>
    </tr>
  @endforeach
    </tbody>
  </table>
  
  <div class="ui divider"></div>
@endsection