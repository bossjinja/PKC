@extends('layouts.master')

@section('title', 'Prefixes')

@section('content')

  <table class="table">
    <tr><td>Prefix</td><td>Owner(s)</td></tr>
  @foreach ($prefixes as $prefix)
    <tr>
      <td><a href="{{ route('showprefix', $prefix->id) }}">{{ $prefix->prefix }}</a></td>
      <td>
        @foreach ($prefix->users as $user)
          <a href="{{ route('showuser', $user->name) }}">{{ $user->name}}</a>,
        @endforeach
      </td>
    </tr>
  @endforeach
  </table>
  
@endsection