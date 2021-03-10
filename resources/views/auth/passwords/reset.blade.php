@extends('layouts.app')

@section('content')
<div class="w3-row">
    <div class="w3-col w3-container m1 l1">
    </div>

    <div class="w3-col w3-container m10 l10 w3-padding ">
        <div class="w3-row w3-card w3-margin-top">
            <div class="w3-col w3-container l12 w3-margin-top w3-padding ">
                <div class="w3-margin"><br>
                    <h3>RESET PASSWORDA</h3>
                </div>

                <form class="w3-container" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="w3-section">
                        <label><b>e-mail</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Vaš email" id="email" name="email" value="{{ $email ?? old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Unesite novi password" name="password" id="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label><b>Potvrdite password</b></label>
                        <input id="password-confirm" class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Potvrdite password" name="password_confirmation" required autocomplete="new-password">


                        <button class="w3-button w3-block w3-blue w3-hover-orange w3-section w3-padding" type="submit">Reset passworda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="w3-col w3-container m1 l1">
    </div>
</div>
@endsection