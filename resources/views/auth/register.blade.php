@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w3-row w3-margin">
    </div>
    <div class="w3-row">
        <div>
            <div class="w3-modal-content w3-card-4" style="max-width:600px">

                <div class="w3-center"><br>
                    <img src="https://www.w3schools.com/w3css/img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                </div>
                <div class="w3-center"><br>
                    <h3>REGISTRACIJA</h3>
                </div>

                <form class="w3-container" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="w3-section">
                        <label><b>Ime</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Unesite Vaše ime" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label><b>e-mail adresa</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Unesite e-mail adresu" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Unesite password" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label><b>Potvrda passworda</b></label>
                        <input class="w3-input w3-border" type="password" placeholder="Unesite password ponovo" name="password_confirmation" required>

                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Restracija</button>
                    </div>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <span class="w3-left w3-padding s6"><a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Već imate račun?') }}
                        </a></span>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection