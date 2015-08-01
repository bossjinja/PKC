@extends('layouts.master')

@section('title', 'Register Prefix')

@section('content')

  Register prefix form
  
  <form method="POST" action="{{ route('storebreed') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group col-md-4">
        <label for="display">Prefix Display</label>
        <input type="text" name="display" value="{{ old('display') }}" class="form-control">
    </div>
  
    <div class="form-group col-md-4">
        <label for="prefix_possessive">Prefix Possessive</label>
        <select name="prefix_possessive" class="form-control">
            <option value="">none</option>
            <option value="'">'</option>
            <option value="'s">'s</option>
            <option value="'z">'z</option>
            <option value="s">s</option>
            <option value="z">z</option>
        </select>
    </div>
      
    <div class="form-group col-md-4">
      <label for="suffix_possessive">Suffix Possessive</label>
      <select name="suffix_possessive" class="form-control">
          <option value="">none</option>
          <option value="of">of</option>
          <option value="at">at</option>
          <option value="von">von</option>
          <option value="vom">vom</option>
          <option value="de">de</option>
          <option value="d'">d'</option>
          <option value="no">no</option>
          <option value="z">z</option>
      </select>
    </div>
      
    <div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

@endsection