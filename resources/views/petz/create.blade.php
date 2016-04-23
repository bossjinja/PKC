@extends('layouts.master')

@section('title', 'Register Petz')

@section('content')
  <h1>Register Pet</h1>
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <h5 class="ui top attached header inverted">Your petz showname will display as:</h5>
    <div class="ui attached segment" id="computated_showname">
      
    </div>
    <div class="ui divider"></div>
    <form method="POST" action="{{ route('storepet') }}" enctype="multipart/form-data" class="ui form">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <div class="four fields">
        <div class="three wide field">
          <label for="prefix1">Prefix</label>
          <select name="prefix1" id="prefix1" class="ui dropdown sn">
            <option value=""></option>
            @foreach ($prefixes as $prefix)
              <option value="{{ $prefix->id }}" suffix="{{ $prefix->suffix_possessive }}" prefix="{{ $prefix->prefix_possessive }}">{{ $prefix->prefix }}</option>
            @endforeach
          </select>
        </div>
          
        <div class="three wide field">
          <label for="prefix2">Prefix</label>
          <select name="prefix2" id="prefix2" class="ui dropdown sn">
            <option value=""></option>
            @foreach ($prefixes as $prefix)
              <option value="{{ $prefix->id }}" suffix="{{ $prefix->suffix_possessive }}" prefix="{{ $prefix->prefix_possessive }}">{{ $prefix->prefix }}</option>
            @endforeach
          </select>
        </div>
        
        
        <div class="seven wide field">
            <label for="showname">Showname</label>
            <input type="text" name="showname" id="showname" value="{{ old('showname') }}" class="sn">
        </div>
          
        <div class="three wide field">
          <label for="suffix">Suffix</label>
          <select name="suffix" id="suffix" class="ui dropdown sn">
            <option value=""></option>
            @foreach ($prefixes as $prefix)
              <option value="{{ $prefix->id }}" suffix="{{ $prefix->suffix_possessive }}" prefix="{{ $prefix->prefix_possessive }}">{{ $prefix->prefix }}</option>
            @endforeach
          </select>
        </div>
      </div>
        
      <div class="five fields">
        <div class="three wide field">
            <label for="callname">Callname</label>
            <input type="text" name="callname" value="{{ old('callname') }}" class="form-control">
        </div>
          
        <div class="four wide field">
          <label for="breed_id">Breed</label>
          <select id="breed" name="breed_id" class="ui dropdown">
            @foreach ($breeds as $breed)
              <option value="{{ $breed->id }}">{{ $breed->breedname }}</option>
            @endforeach
          </select>
        </div>
        
        <div class="three wide field">
          <label for="regtype">Registration Type</label>
            <select name="regtype" class="ui dropdown">
              <option value="Full">Full</option>
              <option value="Limited">Limited</option>
            </select>
        </div>
          
        <div class="three wide field">
          <label for="sex">Sex</label>
            <select name="sex" class="ui dropdown">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
        </div>
          
        <div class="three wide field">
          <label for="version">Petz Version</label>
            <select name="version" class="ui dropdown">
              <option value="Petz 3/4">Petz 3/4</option>
              <option value="Petz 5">Petz 5</option>
            </select>
        </div>
      </div>
      
      <div class="three fields">
        <div class="three wide field">
          <label for="sire">Sire PKC#</label>
          <input type="text" name="sire" value="{{ old('sire') }}">
        </div>
          
        <div class="three wide field">
          <label for="dam">Dam PKC#</label>
          <input type="text" name="dam" value="{{ old('dam') }}">
        </div>
          
        <div class="ten wide field">
          <label for="coat">Coat Color & Pattern</label>
          <input type="text" name="coat" value="{{ old('coat') }}">
        </div>
      </div>
        
      <div class="field" id="breedfile-div">
        
      </div>
        
      <div class="field">
        <label for="pattern">Registration Pictures</label>
        <input type="file" name="reg1">
        <input type="file" name="reg2">
        <input type="file" name="reg3">
        <p class="help-block">You must upload a picture of the left side and right side of the pet. Third slot is optional (for eyes, etc).</p>
      </div>
    
      <div>
          <button type="submit" class="ui button">Submit</button>
      </div>
      
      
    </form>

    
  <script type="text/javascript">
      $(".dropdown").dropdown();
  
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

