@extends('layouts.master')

@section('title', 'Add Breed')

@section('content')

This is the add breed form.

<form class="ui form" method="POST" action="{{ route('storebreed') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
  <div class="field">
      <label for="breedname">Breed Name</label>
      <input type="text" name="breedname" value="{{ old('breedname') }}">
  </div>

  <div class="field">
      <label for="breedgroup_id">Group</label>
      <select name="breedgroup_id" class="ui dropdown">
        @foreach ($groups as $group)
          <option value="{{ $group->id }}">{{ $group->groupname }}</option>
        @endforeach
      </select>
  </div>
  
  <div class="field">
    <label for="structure">Structure</label>
    <textarea name="structure">
    </textarea>
  </div>
  
  <div class="field">
    <label for="color">Color</label>
    <textarea name="color">
    </textarea>
  </div>
  
  <div class="field">
    <label for="faultsdqs">Faults & DQs</label>
    <textarea name="faultsdqs">
    </textarea>
  </div>
  
  <div class="field">
    <label for="notes">Notes</label>
    <textarea name="notes">
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