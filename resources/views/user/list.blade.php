@extends('layouts.master')

@section('title', 'User List')

@section('content')

Users: {{ count($users) }}<br><br>

@foreach ($users as $user)
    <a href='{{ route('showuser', $user->name)}}'>{{ $user->name }}</a><br>
@endforeach

@endsection