@extends('layouts.master')

@section('title', 'Register Petz')

@section('content')

  This is register petz form.
  
  <form method="POST" action="{{ route('storepet') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group col-md-6">
        <label for="showname">Showname</label>
        <input type="text" name="showname" value="{{ old('showname') }}" class="form-control">
    </div>
  
    <div class="form-group col-md-6">
        <label for="callname">Callname</label>
        <input type="text" name="callname" value="{{ old('callname') }}" class="form-control">
    </div>
  
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection