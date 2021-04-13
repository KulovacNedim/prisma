@extends('layouts.app')

@section('content')
<div class="w3-row">
    <div class="w3-col w3-container m1 l1">
    </div>

    <div class="w3-col w3-container m10 l10 w3-padding ">
        <div class="w3-row w3-margin-top">
            <div class="w3-col w3-container l7 w3-margin-top w3-padding ">
                <div class="w3-container w3-large w3-border-blue w3-bottombar" style="height: 50px; display:flex; align-items: center">
                    PRIJAVITE SE
                </div>
                <div class="w3-row" style="margin-top: 25px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p>
                            <input class="w3-input" type="email" placeholder="e-mail" name="email" value="{{ old('email') }}" required>
                        </p>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p>
                            <input class="w3-input" type="password" placeholder="Password" name="password" required>
                        </p>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="w3-row">
                            <div class="w3-col m6 l6">
                                <button class="w3-button w3-block w3-blue w3-section w3-margin-top w3-hover-orange" type="submit">Login</button>
                            </div>
                            <div class="w3-col m6 l6">
                                <span class="w3-right">
                                    <input class="w3-check w3-margin-top" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label w3-margin-left" for="remember">
                                        {{ __('Zapamti me') }}
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="w3-row w3-margin-top">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Zaboravljen password?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w3-col w3-container l5">
                @if(Cart::count() > 0)
                <div class="w3-container w3-light-grey w3-padding">
                    <div class="w3-row">
                        <div class="w3-container w3-border-blue w3-bottombar" style="height: 50px; display:flex; align-items: center">
                            NASTAVITE KAO GOST
                        </div>
                        <div class="w3-row w3-margin-top">
                            Ne morate se registrovati da biste poslali upit. Možete nastaviti kao gost.
                        </div>
                        <div class="w3-row w3-margin-top w3-center">
                            <a class="btn btn-link" href="{{ route('guest-checkout.index') }}">
                                <button class="w3-button w3-orange w3-small w3-hover-blue w3-text-white" type="submit">Pošalji upit kao gost</button>
                            </a>
                        </div>
                    </div>
                    <div class="w3-row w3-margin-bottom" style="margin-top: 55px;">
                        <div class="w3-container  w3-border-blue w3-bottombar" style="height: 50px; display:flex; align-items: center">
                            REGISTRUJTE SE I UŠTEDITE VRIJEME POSLIJE
                        </div>
                        <div class="w3-row w3-margin-top w3-margin-bottom">
                            Kreirajte račun da biste brže slali upit i imali pregled poslanih upita.
                        </div>
                        <div class="w3-row w3-margin-top w3-center">
                            <a class="btn btn-link" href="{{ route('register') }}">
                                <button class="w3-button w3-blue w3-hover-orange" type="submit">Kreiraj račun</button>
                            </a>
                        </div>
                    </div>
                </div>
                @else
                <div class="w3-margin-top w3-margin-bottom w3-padding w3-light-grey">
                    <div class="w3-container w3-large w3-border-blue w3-bottombar" style="height: 50px; display:flex; align-items: center">
                        REGISTRUJTE SE
                    </div>
                    <div class="w3-row w3-margin w3-margin-bottom">
                        Kreirajte račun da biste brže slali upit i imali pregled poslanih upita.
                    </div>
                    <div class="w3-row w3-margin-top w3-center">
                        <a class="btn btn-link" href="{{ route('register') }}">
                            <button class="w3-button w3-blue w3-hover-orange" type="submit">Kreiraj račun</button>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w3-col w3-container m1 l1">
    </div>
</div>
@endsection