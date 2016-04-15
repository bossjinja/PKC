@extends('layouts.master')

@section('title', 'Petz View')

@section('content')

Hello world, I'm a petz!
<br><br>
Showname: {{ $pet->formatted_showname() }}
<br>
Callname: {{ $pet->callname }}
<br>
Breed: {{ $pet->breed->breedname }}
<br>
Breedfile: {{ $pet->breedfile->breedfilename }}
<br>
Sex: {{ $pet->sex }}
<br>
Version: {{ $pet->version }}
<br>
Owner: <a href="{{ route('showuser', $pet->owner->name) }}">{{ $pet->owner->name }}</a>
<br>
Hexer: @if(!empty($pet->hexer))
           <a href="{{ route('showuser', $pet->hexer->name) }}">{{ $pet->hexer->name }}</a>
       @endif
<br>
Breeder: @if(!empty($pet->breeder))
           <a href="{{ route('showuser', $pet->breeder->name) }}">{{ $pet->breeder->name }}</a>
         @endif
<br>
Registration: {{ $pet->regtype }}
<br>
Old PKC#: {{ $pet->oldpkc_id }}
<br>
Notes: {{ $pet->notes }}

<br>
Pedigree
<table class="ui celled table">
    <thead>
        <tr><th colspan='4'>Pedigree</th></tr>
    </thead>
    <tbody>
        <tr>
          <td rowspan='8'>{{ $pet->formatted_showname() }}</td>
          <td rowspan='4' class="active">
            @if (!empty($pedigree['sire']))
              <a href='{{ route('showpet', $pedigree['sire']->id) }}'>{{ $pedigree['sire']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
          <td rowspan='2' class="active">
            @if (!empty($pedigree['pgrandsire']))
              <a href='{{ route('showpet', $pedigree['pgrandsire']->id) }}'>{{ $pedigree['pgrandsire']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
          <td rowspan='1' class="active">
            @if (!empty($pedigree['ppggrandsire']))
              <a href='{{ route('showpet', $pedigree['ppggrandsire']->id) }}'>{{ $pedigree['ppggrandsire']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
        </tr>
        <tr>
          <td rowspan='1'>
            @if (!empty($pedigree['ppggranddam']))
              <a href='{{ route('showpet', $pedigree['ppggranddam']->id) }}'>{{ $pedigree['ppggranddam']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
        </tr>
        <tr>
          <td rowspan='2'>
            @if (!empty($pedigree['pgranddam']))
              <a href='{{ route('showpet', $pedigree['pgranddam']->id) }}'>{{ $pedigree['pgranddam']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
          <td rowspan='1' class="active">
            @if (!empty($pedigree['pmggrandsire']))
              <a href='{{ route('showpet', $pedigree['pmggrandsire']->id) }}'>{{ $pedigree['pmggrandsire']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
        </tr>
        <tr>
          <td rowspan='1'>
            @if (!empty($pedigree['pmggranddam']))
              <a href='{{ route('showpet', $pedigree['pmggranddam']->id) }}'>{{ $pedigree['pmggranddam']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
        </tr>
        <tr>
          <td rowspan='4'>
            @if (!empty($pedigree['dam']))
              <a href='{{ route('showpet', $pedigree['dam']->id) }}'>{{ $pedigree['dam']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
          <td rowspan='2' class="active">
            @if (!empty($pedigree['mgrandsire']))
              <a href='{{ route('showpet', $pedigree['mgrandsire']->id) }}'>{{ $pedigree['mgrandsire']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
          <td rowspan='1' class="active">
            @if (!empty($pedigree['mpggrandsire']))
              <a href='{{ route('showpet', $pedigree['mpggrandsire']->id) }}'>{{ $pedigree['mpggrandsire']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
        </tr>
        <tr>
          <td rowspan='1'>
            @if (!empty($pedigree['mpggranddam']))
              <a href='{{ route('showpet', $pedigree['mpggranddam']->id) }}'>{{ $pedigree['mpggranddam']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
        </tr>
        <tr>
          <td rowspan='2'>
            @if (!empty($pedigree['mgranddam']))
              <a href='{{ route('showpet', $pedigree['mgranddam']->id) }}'>{{ $pedigree['mgranddam']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
          <td rowspan='1' class="active">
            @if (!empty($pedigree['mmggrandsire']))
              <a href='{{ route('showpet', $pedigree['mmggrandsire']->id) }}'>{{ $pedigree['mmggrandsire']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
        </tr>
        <tr>
          <td rowspan='1'>
            @if (!empty($pedigree['mmggranddam']))
              <a href='{{ route('showpet', $pedigree['mmggranddam']->id) }}'>{{ $pedigree['mmggranddam']->formatted_showname() }}</a>
            @else
              unknown
            @endif
          </td>
        </tr>
    </tbody>
</table>

<div class="ui divider"></div>
@endsection
  