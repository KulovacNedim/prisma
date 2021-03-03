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
                    <h3>LOGIN</h3>
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
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
                        <input class="w3-check w3-margin-top" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label w3-margin-left" for="remember">
                            {{ __('Zapamti me') }}
                        </label>
                    </div>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-hide-small">
                    <span class="w3-left w3-padding s6"><a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Nemate račun?') }}
                        </a></span>
                    @if (Route::has('password.request'))
                    <span class="w3-right w3-padding s6"><a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Zaboravljen password?') }}
                        </a></span>
                    @endif
                </div>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-hide-medium w3-hide-large">
                    <span class="w3-left w3-padding s6"><a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Nemate račun?') }}
                        </a></span>
                    @if (Route::has('password.request'))
                    <span class="w3-left w3-padding s6"><a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Zaboravljen password?') }}
                        </a></span>
                    @endif
                </div>
                @if(Cart::count() > 0)
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <span class="w3-left w3-padding s6"><a class="btn btn-link" href="{{ route('guest-checkout.index') }}">
                            Posalji upit bez prijave/registracije
                        </a></span>
                </div>
                @endif



            </div>
        </div>
    </div>
</div>
@endsection