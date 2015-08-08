@extends('layouts.master')

@section('title', 'Register Prefix')

@section('content')

  Register prefix form
  
  <form method="POST" action="{{ route('updateprefix', [$prefix->id]) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group col-md-4">
        <label for="prefix">Prefix Display</label>
        <input type="text" name="prefix" value="{{ $prefix->prefix }}" class="form-control">
    </div>
      
  
    <div class="form-group col-md-4">
        <label for="prefix_possessive">Prefix Possessive</label>
        <select name="prefix_possessive" class="form-control">
          @foreach($prefix->prefix_possessives as $key => $value)
            @if($prefix->prefix_possessive == $value)
              <option value="{{ $value }}" selected="selected">{{ $key }}</option>
            @else
              <option value="{{ $value }}">{{ $key }}</option>
            @endif
          @endforeach
        </select>
    </div>
      
    <div class="form-group col-md-4">
      <label for="suffix_possessive">Suffix Possessive</label>
      <select name="suffix_possessive" class="form-control">
          @foreach($prefix->suffix_possessives as $key => $value)
            @if($prefix->suffix_possessive == $value)
              <option value="{{ $value }}" selected="selected">{{ $key }}</option>
            @else
              <option value="{{ $value }}">{{ $key }}</option>
            @endif
          @endforeach
      </select>
    </div>
      
    <div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

@endsection