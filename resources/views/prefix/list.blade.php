Prefix List

<table>
  <tr><td>Prefix</td><td>Owner(s)</td></tr>
@foreach ($prefixes as $prefix)
  <tr>
    <td>{{ $prefix->display }}</td>
    <td>
      @foreach ($prefix->users as $user)
        {{ $user->name}},
      @endforeach
    </td>
  </tr>
@endforeach
</table>