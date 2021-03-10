@extends('layouts.app')

@section('content')
<div class="w3-row">
    <div class="w3-col w3-container m1 l1">
    </div>

    <div class="w3-col w3-container m10 l10 w3-padding ">
        <div class="w3-row w3-card w3-margin-top">
            <div class="w3-col w3-container l7 w3-margin-top w3-padding ">
                <div class="w3-margin"><br>
                    <h3>PRIJAVITE SE</h3>
                </div>

                <form class="w3-container" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="w3-section">
                        <label><b>e-mail adresa</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Unesite e-mail adresu" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border" type="password" placeholder="Unesite password" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="w3-container w3-margin-top" style="padding-left: 0;">
                            <div class="w3-col m6 l8">
                                <button class="w3-button w3-block w3-blue w3-section w3-margin-top w3-hover-orange" type="submit">Login</button>
                            </div>
                            <div class=" w3-col m6 l4">
                                <input class="w3-check w3-margin-top" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label w3-margin-left" for="remember">
                                    {{ __('Zapamti me') }}
                                </label>
                            </div>
                        </div>
                        <div class="w3-margin-top"><a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Zaboravljen password?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w3-col w3-container l5 w3-margin-top w3-margin-bottom w3-padding w3-border-left" style="min-height: 400px;">
                <div class="w3-container w3-margin">
                    @if(Cart::count() > 0)
                    <div class="w3-center w3-margin-top"><br>
                        <h3>NOVI KORISNIK</h3>
                    </div>
                    <div class="w3-margin-top"><br>
                        <b>
                            <p>Uštedite vrijeme sada.</p>
                        </b>
                        <p>Ne morate se registrovati da biste poslali upit. Možete nastaviti kao gost.</p>
                    </div>
                    <div class="w3-center">
                        <a class="btn btn-link" href="{{ route('guest-checkout.index') }}">
                            <button class="w3-button w3-orange w3-small w3-hover-blue w3-text-white" type="submit">Pošalji upit kao gost</button>
                        </a>
                    </div>
                    @endif

                    <div class="w3-margin-top"><br>
                        <b>
                            <p>Registrujte se! Uštedite vrijeme poslije.</p>
                        </b>
                        <p>Kreirajte račun da biste brže slali upit i imali pregled poslanih upita.</p>
                    </div>
                    <div class="w3-center">
                        <a class="btn btn-link" href="{{ route('register') }}">
                            <button class="w3-button w3-blue w3-hover-orange" type="submit">Kreiraj račun</button>
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