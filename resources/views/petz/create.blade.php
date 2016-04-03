@extends('layouts.master')

@section('title', 'Register Petz')

@section('content')
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Your petz showname will display as:</h3>
    </div>
    <div class="panel-body" id="computated_showname">
    </div>
  </div>
  
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
      <select id="breed" name="breed" class="form-control">
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
      
    <div class="form-group col-md-2">
      <label for="sire">Sire PKC#</label>
      <input type="text" name="sire" value="{{ old('sire') }}" class="form-control">
    </div>
      
    <div class="form-group col-md-2">
      <label for="dam">Dam PKC#</label>
      <input type="text" name="dam" value="{{ old('dam') }}" class="form-control">
    </div>
      
    <div class="form-group col-md-8">
      <label for="pattern">Pattern</label>
      <input type="text" name="pattern" value="{{ old('pattern') }}" class="form-control">
    </div>
      
    <div class="form-group col-md-12" id="breedfile-div">
      
    </div>
  
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
    
  </form>
    
  <script type="text/javascript">
      //showname preview
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
      
      //breedfile selector
      //send ajax to pull the breedfiles for the selected breed and displays them
      $("#breed").change(function(){
        var breed = $("#breed").val();
        //alert(breed);
        
        //send ajax request to get breedfiles
        $.ajax({
          headers: { 'csrftoken' : '{{ csrf_token() }}' },
          url: '{{ route('ajax.breedfiles') }}',
          data: { breed: breed },
          type: 'GET',
          error: function() {
            alert("Error!");
          },
          success: function(data){
            //alert("Success");
            //console.log(JSON.stringify(data));
            html = "<div class=\"radio\">";
            html += "<label>";
            html += "<input type=\"radio\" name=\"breedfile_id\" value=\"0\" checked>";
            html += "I don't know/mix of files";
            html += "</label></div>";
            
            
            $.each(data.breedfiles, function(i, breedfile){
              //alert(breedfile.breedfilename);
              html += "<div class=\"radio\">";
              html += "<label>";
              html += "<input type=\"radio\" name=\"breedfile_id\" value=\"";
              html += breedfile.id;
              html += "\">";
              html += breedfile.breedfilename;
              html += "</label></div>";
            });
            
            $("#breedfile-div").html(html);
          }
        });
        
      });
  </script>
@endsection

