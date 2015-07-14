This is register petz form.

<form method="POST" action="{{ route('regpet') }}">
  
  <div>
      Showname
      <input type="text" name="name" value="{{ old('name') }}">
  </div>

  <div>
      Callname
      <input type="password" name="password" id="password">
  </div>

  <div>
      <button type="submit">Submit</button>
  </div>
</form>