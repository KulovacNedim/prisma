@extends('layouts.app')

@section('content')

@include('partials.my-profile-menu')

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:260px; position: relative;">
  <div class="w3-row">
    <div class="w3-col l11">
      <div class="w3-row">
        <div class="w3-container w3-large w3-blue" style="height: 50px; display:flex; align-items: center">
          MOJ PROFIL
        </div>
        <div class="w3-row-padding">
          <div class="w3-row w3-margin-top">
            <form class="w3-container w3-padding-16 w3-white w3-margin-top" action="{{ route('users.update') }}" method="POST" name="usrform">
              @csrf
              @method('patch')
              <div class="w3-section">
                <label>Ime i prezime</label>
                <input class="w3-input" type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
              </div>
              <div class="w3-section">
                <label>Vaš email</label>
                <input class="w3-input" type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
              </div>
              <div class="w3-section">
                <label>Lozinka</label>
                <input class="w3-input" type="password" id="password" name="password">
              </div>
              <div class="w3-section">
                <label>Potvrda lozinke</label>
                <input class="w3-input" type="password" id="password-confirm" name="password_confirmation">
              </div>
              <button type="submit" class="w3-button w3-right w3-blue w3-hover-red">Sačuvaj promjene</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="w3-col l1"></div>
  </div>

  <button onclick="w3_open_profile()" class="w3-button w3-circle w3-red w3-hover-red w3-text-white w3-hide-large" style="position: fixed;bottom: 35px; right: 20px;"><i class="fas fa-user"></i></button>


  <!-- END MAIN -->
</div>


@endsection