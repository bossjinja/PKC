@extends('layouts.master')

@section('title', 'User View')

@section('content')

I am a user of many things!
<br>
Username: {{ $user->name }}
<br>
Petz: {{ count($user->petz) }}
<br>
Prefixes: {{ count($user->prefixes) }}

<h3>Prefixes</h3>
    <div class="ui link list">
    @foreach ($user->prefixes as $prefix)
        <div class="item"><a href="{{ route('showprefix', $prefix->id) }}">{{ $prefix->prefix }}</a></div>
    @endforeach
    </div>

<h3>Petz</h3>
    <table class="ui celled table">
        <thead>
            <tr><th>Showname</th><th>Callname</th><th>Breed</th><th>Sex</th></tr>
        </thead>
        <tbody>
            @foreach ($user->petz as $pet)
                <tr>
                    <td><a href='../petz/{{ $pet->id }}'>{{ $pet->formatted_showname() }}</a></td>
                    <td>{{ $pet->callname }}</td>
                    <td>{{ $pet->breed->breedname }}</td>
                    <td>
                        @if($pet->sex == 'male')
                            <i class="man icon blue"></i>
                        @else
                            <i class="woman icon pink"></i>
                        @endif
                    {{ $pet->sex }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection