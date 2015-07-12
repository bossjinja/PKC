Here is a list of petz:

@if (count($pet) === 1)
    I have one record!
@elseif (count($pet) > 1)
    I have {{ (count($pet)) }} records!
@else
    I don't have any records!
@endif

@foreach ($pet as $pet)
    <p>This is pet {{ $pet->showname }}</p>
@endforeach

