@extends('layouts.master')

@section('title', 'Register Prefix')

@section('content')

  Register prefix form
  
  <form method="POST" action="{{ route('storeprefix') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group col-md-4">
        <label for="prefix">Prefix Display</label>
        <input type="text" name="prefix" value="{{ old('prefix') }}" class="form-control">
    </div>
  
    <div class="form-group col-md-4">
        <label for="prefix_possessive">Prefix Possessive</label>
        <select name="prefix_possessive" class="form-control">
            @foreach($prefix->prefix_possessives as $key => $value)
              <option value="{{ $value }}">{{ $key }}</option>
            @endforeach
        </select>
    </div>
      
    <div class="form-group col-md-4">
      <label for="suffix_possessive">Suffix Possessive</label>
      <select name="suffix_possessive" class="form-control">
          @foreach($prefix->suffix_possessives as $key => $value)
              <option value="{{ $value }}">{{ $key }}</option>
            @endforeach
      </select>
    </div>
      
    <div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

@endsection