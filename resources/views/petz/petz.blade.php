Hello world, I'm a petz!
<br><br>
Showname: {{ $pet->formatted_showname() }}
<br>
Callname: {{ $pet->callname }}
<br>
Breed: {{ $pet->breed->breedname }}
<br>
Breedfile: {{ $pet->breedfile->breedfilename }}
<br>
Sex: {{ $pet->sex }}
<br>
Version: {{ $pet->version }}
<br>
Owner: {{ $pet->owner->name }}
<br>
Hexer: {{ $pet->hexer->name or '' }}
<br>
Breeder: {{ $pet->breeder->name or '' }}
<br>
Registration: {{ $pet->regtype }}
<br>
Old PKC#: {{ $pet->oldpkc_id }}
<br>
Notes: {{ $pet->notes }}

<br>