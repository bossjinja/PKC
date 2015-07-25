@extends('layouts.master')

@section('title', $breed->breedname)

@section('content')

This is showing one breed.<br>

{{ $breed->breedname }}

<p>Group: {{ $breed->breedgroup->groupname }}</p>

<p>{{ $breed->color }}</p>
<p>{{ $breed->structure }} </p>
<p>{{ $breed->faultsdqs }} </p>
<p>{{ $breed->notes }} </p>

@endsection