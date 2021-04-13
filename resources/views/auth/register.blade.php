@extends('layouts.app')

@section('content')
<div class="w3-row">
    <div class="w3-col w3-container m1 l1">
    </div>

    <div class="w3-col w3-container m10 l10 w3-padding ">
        <div class="w3-row w3-margin-top">
            <div class="w3-col w3-container l7 w3-margin-top w3-padding ">
                <div class="w3-container w3-large w3-border-blue w3-bottombar" style="height: 50px; display:flex; align-items: center">
                    REGISTRUJTE SE
                </div>
                <div class="w3-row" style="margin-top: 25px;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <p>
                            <input class="w3-input" type="name" placeholder="Vaše ime" name="name" value="{{ old('name') }}" required>
                        </p>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p>
                            <input class="w3-input" type="email" placeholder="e-mail adresa" name="email" required>
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
                        <p>
                            <input class="w3-input" type="password" placeholder="Potvrdite password" name="password_confirmation" required>
                        </p>
                        <div class="w3-row">
                            <div class="w3-col m6 l6">
                                <button class="w3-button w3-block w3-blue w3-hover-orange w3-section w3-padding" type="submit">Registracija</button>
                            </div>
                            <div class="w3-col m6 l6">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w3-col w3-container l5">
                <div class="w3-margin-top w3-margin-bottom w3-padding w3-light-grey">
                    <div class="w3-container w3-large w3-border-blue w3-bottombar" style="height: 50px; display:flex; align-items: center">
                        VEĆ STE REGISTROVANI?
                    </div>
                    <div class="w3-row w3-margin w3-margin-bottom">

                    </div>
                    <div class="w3-row w3-margin-top w3-center">
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