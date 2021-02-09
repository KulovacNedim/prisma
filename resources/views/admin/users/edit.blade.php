@extends('layouts.app')

@section('content')
<div>
  <div class="w3-modal-content w3-animate-top w3-card-4">

    <div class="w3-container w3-blue">
      <h2>Podaci o korisniku</h2>
    </div>

    <form class="w3-container" action="{{ route('admin.users.update', $user) }}" method="POST">
      @csrf
      {{ method_field('PUT')}}
      <p>
        <label>Ime</label>
        <input class="w3-input" type="text" placeholder="Unesite ime" name="name" value="{{ $user->name }}" required>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </p>
      <p>
        <label>email</label>
        <input class="w3-input" type="text" placeholder="Unesite email" name="email" value="{{ $user->email }}" required>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </p>
      <h3 style="display: inline-block; margin-right: 20px">Role: </h3>
      @foreach($roles as $role)
      <span style="margin-right: 25px;">
        <input class="w3-check" type="checkbox" name="roles[]" value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
        <label>{{ $role->name }}</label>
      </span>
      @endforeach
      <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" style="width: 100%">Update</button>
    </form>
  </div>
</div>

</div>
@endsection