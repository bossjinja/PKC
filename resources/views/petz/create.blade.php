@extends('layouts.master')

@section('title', 'Register Petz')

@section('content')

  This is register petz form.
  
  <form method="POST" action="{{ route('storepet') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group col-md-2">
      <label for="prefix1">Prefix</label>
      <select name="prefix1" class="form-control">
        <option value="0"></option>
        @foreach ($prefixes as $prefix)
          <option value="{{ $prefix->id }}">{{ $prefix->prefix }}</option>
        @endforeach
      </select>
    </div>
      
    <div class="form-group col-md-2">
      <label for="prefix2">Prefix</label>
      <select name="prefix2" class="form-control">
        <option value="0"></option>
        @foreach ($prefixes as $prefix)
          <option value="{{ $prefix->id }}">{{ $prefix->prefix }}</option>
        @endforeach
      </select>
    </div>
    
    
    <div class="form-group col-md-6">
        <label for="showname">Showname</label>
        <input type="text" name="showname" value="{{ old('showname') }}" class="form-control">
    </div>
      
    <div class="form-group col-md-2">
      <label for="suffix">Suffix</label>
      <select name="suffix" class="form-control">
        <option value="0"></option>
        @foreach ($prefixes as $prefix)
          <option value="{{ $prefix->id }}">{{ $prefix->prefix }}</option>
        @endforeach
      </select>
    </div>
      
  
    <div class="form-group col-md-3">
        <label for="callname">Callname</label>
        <input type="text" name="callname" value="{{ old('callname') }}" class="form-control">
    </div>
      
    <div class="form-group col-md-3">
      <label for="breed">Breed</label>
      <select name="breed" class="form-control">
        @foreach ($breeds as $breed)
          <option value="{{ $breed->id }}">{{ $breed->breedname }}</option>
        @endforeach
      </select>
    </div>
    
    <div class="form-group col-md-2">
      <label for="regtype">Registration Type</label>
        <select name="regtype" class="form-control">
          <option value="Full">Full</option>
          <option value="Limited">Limited</option>
        </select>
    </div>
      
    <div class="form-group col-md-2">
      <label for="sex">Sex</label>
        <select name="sex" class="form-control">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
    </div>
      
    <div class="form-group col-md-2">
      <label for="version">Petz Version</label>
        <select name="version" class="form-control">
          <option value="Petz 3/4">Petz 3/4</option>
          <option value="Petz 5">Petz 5</option>
        </select>
    </div>
  
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection