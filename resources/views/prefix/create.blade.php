@extends('layouts.master')

@section('title', 'Register Prefix')

@section('content')

  <h1>Register Prefix</h1>
  
  <form method="POST" action="{{ route('storeprefix') }}" class="ui form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="three fields">
      <div class="field">
          <label for="prefix">Prefix Display</label>
          <input type="text" name="prefix" value="{{ old('prefix') }}">
      </div>
    
      <div class="field">
          <label for="prefix_possessive">Prefix Possessive</label>
          <select name="prefix_possessive" class="ui dropdown">
              @foreach($prefix->prefix_possessives as $key => $value)
                <option value="{{ $value }}">{{ $key }}</option>
              @endforeach
          </select>
      </div>
        
      <div class="field">
        <label for="suffix_possessive">Suffix Possessive</label>
        <select name="suffix_possessive" class="ui dropdown">
            @foreach($prefix->suffix_possessives as $key => $value)
                <option value="{{ $value }}">{{ $key }}</option>
              @endforeach
        </select>
      </div>
    </div>
      
    <div>
      <button type="submit" class="ui button">Submit</button>
    </div>
      
    <script>
        $('select.dropdown').dropdown();
    </script>

@endsection