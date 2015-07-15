This is a list of all breeds.
<br><br>
Dogz
@foreach ($dogbreeds as $dogbreed)
  <br>{{ $dogbreed->breedname }} - {{ $dogbreed->breedgroup->groupname }}
@endforeach
<br><Br>
Catz
@foreach ($catbreeds as $catbreed)
  <br>{{ $catbreed->breedname }} - {{ $catbreed->breedgroup->groupname }}
@endforeach