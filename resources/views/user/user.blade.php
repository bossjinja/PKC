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

<br><br>
<h3>Prefixes</h3>
    <ul class="list-unstyled">
    @foreach ($user->prefixes as $prefix)
        <li>{{ $prefix->display }}</li>
    @endforeach
    </ul>

<h3>Petz</h3>
    <table class="table table-bordered">
        <tr><th>Showname</th><th>Callname</th><th>Breed</th><th>Sex</th></tr>
            @foreach ($user->petz as $pet)
                <tr>
                    <td><a href='../petz/{{ $pet->id }}'>{{ $pet->formatted_showname() }}</a></td>
                    <td>{{ $pet->callname }}</td>
                    <td>{{ $pet->breed->breedname }}</td>
                    <td>{{ $pet->sex }}</td>
                </tr>
            @endforeach
    </table>
@endsection