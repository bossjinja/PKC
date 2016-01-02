@extends('layouts.master')

@section('title', 'Register Petz')

@section('content')

  This is register petz form.
  
  <form method="POST" action="{{ route('storepet') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group col-md-2">
      <label for="prefix1">Prefix</label>
      <select name="prefix1" id="prefix1" class="form-control sn">
        <option value="0"></option>
        @foreach ($prefixes as $prefix)
          <option value="{{ $prefix->id }}" suffix="{{ $prefix->suffix_possessive }}" prefix="{{ $prefix->prefix_possessive }}">{{ $prefix->prefix }}</option>
        @endforeach
      </select>
    </div>
      
    <div class="form-group col-md-2">
      <label for="prefix2">Prefix</label>
      <select name="prefix2" id="prefix2" class="form-control sn">
        <option value="0"></option>
        @foreach ($prefixes as $prefix)
          <option value="{{ $prefix->id }}" suffix="{{ $prefix->suffix_possessive }}" prefix="{{ $prefix->prefix_possessive }}">{{ $prefix->prefix }}</option>
        @endforeach
      </select>
    </div>
    
    
    <div class="form-group col-md-6">
        <label for="showname">Showname</label>
        <input type="text" name="showname" id="showname" value="{{ old('showname') }}" class="form-control sn">
    </div>
      
    <div class="form-group col-md-2">
      <label for="suffix">Suffix</label>
      <select name="suffix" id="suffix" class="form-control sn">
        <option value="0"></option>
        @foreach ($prefixes as $prefix)
          <option value="{{ $prefix->id }}" suffix="{{ $prefix->suffix_possessive }}" prefix="{{ $prefix->prefix_possessive }}">{{ $prefix->prefix }}</option>
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
    
    <h4>Your petz showname will display as:</h4>
    <div id="computated_showname">
      
    </div>
  </form>
    
  <script type="text/javascript">
      $(".sn").change(function() {
        var showname = "";
        
        if (($("#prefix1").val() != "0") && ($("#prefix2").val() != "0")) {
          showname += $("#prefix1 option:selected").text()+" "+$("#prefix2 option:selected").text();
          if ($("#prefix2 option:selected").attr('prefix')) {
            showname += $("#prefix2 option:selected").attr('prefix')+" ";
          }
          else{
            showname += " ";
          }
        }
        else if ($("#prefix1").val() != "0") {
          showname += $("#prefix1 option:selected").text();
          
          if ($("#prefix1 option:selected").attr('prefix')) {
            showname += $("#prefix1 option:selected").attr('prefix')+" ";
          }
          else{
            showname += " ";
          }
        }
        else if ($("#prefix2").val() != "0") {
          showname += $("#prefix2 option:selected").text();
          
          if ($("#prefix2 option:selected").attr('prefix')) {
            showname += $("#prefix2 option:selected").attr('prefix')+" ";
          }
          else{
            showname += " ";
          }
        }
        
        showname += $("#showname").val();
        
        if ($("#suffix").val()) {
          if ($("#suffix option:selected").attr('suffix')) {
            showname += " "+$("#suffix option:selected").attr('suffix')+" "+$("#suffix option:selected").text();
          }
          else{
            showname += " "+$("#suffix option:selected").text();
          }
        }
        
        $("#computated_showname").html(showname);
      });
  </script>
@endsection

