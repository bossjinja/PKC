@extends('layouts.app')

@section('content')
<div class="container">

  @if ($errors->any())
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      </div>
    </div>
  @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">Add Breed</h2>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('breeds.update', ['id' => $breed->id]) }}" class="form-horizontal">
                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Breed name</label>
                        <div class="col-sm-6"><input type="text" class="form-control" name="name" value="{{ $breed->name }}"></div>
                      </div>

                      <div class="form-group">
                        <label for="standard_url" class="col-sm-3 control-label">Standard URL</label>
                        <div class="col-sm-9"><input type="text" class="form-control" name="standard_url" value="{{ $breed->standard_url }}"></div>
                      </div>

                      <div class="form-group">
                        <label for="group" class="col-sm-3 control-label">Group</label>
                        <div class="col-sm-6">
                          <select class="form-control" name="group">
                            @foreach ($groups as $key => $group)
                              @if($breed->group == $key)
                                <option value="{{ $key }}" selected>{{ $group }}</option>
                              @else
                                <option value="{{ $key }}">{{ $group }}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>

                      {{ csrf_field() }}

                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                      </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
