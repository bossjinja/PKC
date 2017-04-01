@extends('layouts.master')

@section('title', 'Home')

@section('content')

    Here is a list of petz:
    
    @if (count($pet) === 1)
        I have one record!
    @elseif (count($pet) > 1)
        I have {{ (count($pet)) }} records!
    @else
        I don't have any records!
    @endif
    
    @foreach ($pet as $pet)
        <p><a href='{{ route('showpet', $pet->id) }}'>{{ $pet->formatted_showname() }}</a></p>
    @endforeach

@endsection
