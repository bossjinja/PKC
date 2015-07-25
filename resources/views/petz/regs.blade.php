This page lists the current user's non-Complete regs.

@foreach ($regs as $reg)
    {{ $reg->formatted_showname() }}  {{ $reg->workflow }}
    <br>
@endforeach