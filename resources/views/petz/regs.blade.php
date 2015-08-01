@extends('layouts.master')

@section('title', 'Pending Regs')

@section('content')

    <p>This page lists the current user's non-Complete regs.</p>
    
    <p><a href="{{ route('createpet') }}">Start registration</a></p>
    
    @foreach ($regs as $reg)
        {{ $reg->formatted_showname() }}  {{ $reg->workflow }}
        <br>
    @endforeach

@endsection