This is the add breed form.

<form method="POST" action="{{ route('addbreed') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
  <div>
      Breed Name
      <input type="text" name="breedname" value="{{ old('breedname') }}">
  </div>

  <div>
      Group
      <select name="breedgroup_id">
        @foreach ($groups as $group)
          <option value="{{ $group->id }}">{{ $group->groupname }}</option>
        @endforeach
      </select>
  </div>
  
  <div>
    Structure
    <textarea name="structure">
    </textarea>
  </div>
  
  <div>
    Color
    <textarea name="color">
    </textarea>
  </div>
  
  <div>
    Faults & DQs
    <textarea name="faultsdqs">
    </textarea>
  </div>
  
  <div>
    Notes
    <textarea name="notes">
    </textarea>
  </div>

  <div>
      <button type="submit">Submit</button>
  </div>
</form>