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
Pedigree
<table>
  <tr>
    <td rowspan='8'>{{ $pet->formatted_showname() }}</td>
    <td rowspan='4'>
      @if (!empty($pedigree['sire']))
        {{ $pedigree['sire']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
    <td rowspan='2'>
      @if (!empty($pedigree['pgrandsire']))
        {{ $pedigree['pgrandsire']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
    <td rowspan='1'>
      @if (!empty($pedigree['ppggrandsire']))
        {{ $pedigree['ppggrandsire']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
  </tr>
  <tr>
    <td rowspan='1'>
      @if (!empty($pedigree['ppggranddam']))
        {{ $pedigree['ppggranddam']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
  </tr>
  <tr>
    <td rowspan='2'>
      @if (!empty($pedigree['pgranddam']))
        {{ $pedigree['pgranddam']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
    <td rowspan='1'>
      @if (!empty($pedigree['pmggrandsire']))
        {{ $pedigree['pmggrandsire']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
  </tr>
  <tr>
    <td rowspan='1'>
      @if (!empty($pedigree['pmggranddam']))
        {{ $pedigree['pmggranddam']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
  </tr>
  <tr>
    <td rowspan='4'>
      @if (!empty($pedigree['dam']))
        {{ $pedigree['dam']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
    <td rowspan='2'>
      @if (!empty($pedigree['mgrandsire']))
        {{ $pedigree['mgrandsire']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
    <td rowspan='1'>
      @if (!empty($pedigree['mpggrandsire']))
        {{ $pedigree['mpggrandsire']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
  </tr>
  <tr>
    <td rowspan='1'>
      @if (!empty($pedigree['mpggranddam']))
        {{ $pedigree['mpggranddam']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
  </tr>
  <tr>
    <td rowspan='2'>
      @if (!empty($pedigree['mgranddam']))
        {{ $pedigree['mgranddam']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
    <td rowspan='1'>
      @if (!empty($pedigree['mmggrandsire']))
        {{ $pedigree['mmggrandsire']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
  </tr>
  <tr>
    <td rowspan='1'>
      @if (!empty($pedigree['mmggranddam']))
        {{ $pedigree['mmggranddam']->formatted_showname() }}
      @else
        unknown
      @endif
    </td>
  </tr>
</table>
  