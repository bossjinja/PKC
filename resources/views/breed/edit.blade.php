@extends('layouts.master')

@section('title', 'Edit Breed')

@section('content')

This is the edit breed form.

<form class="ui form" method="POST" action="{{ route('updatebreed', [$breed->id]) }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
   <div class="field">
      <label for="breedname">Breed Name</label>
      <input type="text" name="breedname" value="{{ $breed->breedname }}">
  </div>

  <div class="field">
      <label for="breedgroup_id">Group</label>
      <select name="breedgroup_id" class="ui dropdown">
        @foreach ($groups as $group)
          @if ($breed->breedgroup_id == $group->id)
            <option value="{{ $group->id }}" selected="selected">{{ $group->groupname }}</option>
          @else
            <option value="{{ $group->id }}">{{ $group->groupname }}</option>
          @endif
        @endforeach
      </select>
  </div>
  
  <div class="field">
    <label for="structure">Structure</label>
    <textarea name="structure">
      {{ $breed->structure }}
    </textarea>
  </div>
  
   <div class="field">
    <label for="color">Color</label>
    <textarea name="color">
      {{ $breed->color }}
    </textarea>
  </div>
  
  <div class="field">
    <label for="faultsdqs">Faults & DQs</label>
    <textarea name="faultsdqs">
      {{ $breed->faultsdqs }}
    </textarea>
  </div>
  
  <div class="field">
    <label for="notes">Notes</label>
    <textarea name="notes">
      {{ $breed->notes }}
    </textarea>
  </div>

  <div>
      <button type="submit" class="ui button">Submit</button>
  </div>
</form>
 
 <div class="ui divider"></div>

<script>
    $('select.dropdown').dropdown();
</script>
@endsection