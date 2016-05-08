@extends('layouts.master')

@section('title', 'Pending Regs')

@section('content')

    <p>This page lists the current user's non-Complete regs.</p>

    <p><a href="{{ route('createpet') }}">Start registration</a></p>

    <table class="ui celled table">
      <thead>
        <tr><th>Showname</th><th>Status</th><th>Actions</th></tr>
      </thead>
      <tbody>

        @foreach ($regs as $reg)
          <tr>
            <td>{{ $reg->formatted_showname() }}</td>
            <td>{{ $reg->workflow }}</td>
            <td>View - Edit - Delete - Submit</td>
          </tr>
        @endforeach
      </tbody>
    </table>

@endsection
