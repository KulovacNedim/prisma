@extends('layouts.app')

@section('content')
<div class="w3-row">
    <div class="w3-col w3-container m1 l1">
    </div>

    <div class="w3-col w3-container m10 l10 w3-padding ">
        <div class="w3-row w3-card w3-margin-top">
            <div class="w3-col w3-container l7 w3-margin-top w3-padding ">
                <div class="w3-margin"><br>
                    <h3>KREIRAJTE RAČUN</h3>
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

                        <button class="w3-button w3-block w3-blue w3-hover-orange w3-section w3-padding" type="submit">Restracija</button>
                    </div>
                </form>
            </div>
            <div class="w3-col w3-container l5 w3-margin-top w3-margin-bottom w3-padding w3-border-left" style="min-height: 490px;">
                <div class="w3-container w3-margin">
                    <div class="w3-margin-top"><br>
                        <b>
                            <p>Pogodnosti registracije:</p>
                        </b>
                        <p>Kreirajte račun da biste brže slali upit i imali pregled poslanih upita.</p>
                    </div>
                </div>
                <div class="w3-container w3-margin">
                    <div class="w3-margin-top"><br>
                        <b>
                            <p>Već imate račun?</p>
                        </b>
                        <a class="btn btn-link" href="{{ route('register') }}">
                            <a class="btn btn-link" href="{{ route('login') }}"><button class="w3-button w3-blue w3-hover-orange" type="submit">Prijavite se</button></a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w3-col w3-container m1 l1">
    </div>
</div>
@endsection