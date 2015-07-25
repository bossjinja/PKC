@extends('layouts.master')

@section('title', 'Edit Breed')

@section('content')

This is the edit breed form.

<form method="POST" action="{{ route('editbreed', [$breed->id]) }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
   <div class="form-group">
      <label for="breedname">Breed Name</label>
      <input type="text" name="breedname" value="{{ $breed->breedname }}" class="form-control">
  </div>

  <div class="form-group">
      <label for="breedgroup_id">Group</label>
      <select name="breedgroup_id" class="form-control">
        @foreach ($groups as $group)
          @if ($breed->breedgroup_id == $group->id)
            <option value="{{ $group->id }}" selected="selected">{{ $group->groupname }}</option>
          @else
            <option value="{{ $group->id }}">{{ $group->groupname }}</option>
          @endif
        @endforeach
      </select>
  </div>
  
  <div class="form-group">
    <label for="structure">Structure</label>
    <textarea name="structure" class="form-control">
      {{ $breed->structure }}
    </textarea>
  </div>
  
   <div class="form-group">
    <label for="color">Color</label>
    <textarea name="color" class="form-control">
      {{ $breed->color }}
    </textarea>
  </div>
  
  <div class="form-group">
    <label for="faultsdqs">Faults & DQs</label>
    <textarea name="faultsdqs" class="form-control">
      {{ $breed->faultsdqs }}
    </textarea>
  </div>
  
  <div class="form-group">
    <label for="notes">Notes</label>
    <textarea name="notes" class="form-control">
      {{ $breed->notes }}
    </textarea>
  </div>

  <div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection