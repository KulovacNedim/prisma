@extends('layouts.app')

@section('content')
<div class="w3-row">
    <div class="w3-col w3-container m1 l1">
    </div>

    <div class="w3-col w3-container m10 l10 w3-padding ">
        <div class="w3-row w3-margin-top">
            <div class="w3-col w3-container w3-margin-top w3-padding ">
                <div class="w3-container w3-large w3-border-blue w3-bottombar" style="height: 50px; display:flex; align-items: center">
                    RESET PASSWORD-A
                </div>
                <div class="w3-row" style="margin-top: 25px;">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <p>
                            <input class="w3-input" type="email" placeholder="e-mail adresa" name="email" id="email" value="{{ $email ?? old('email') }}" required>
                        </p>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <p>
                            <input class="w3-input" type="password" placeholder="Novi password" name="password" id="password" autocomplete="new-password" required>
                        </p>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p>
                            <input class="w3-input" id="password-confirm" type="password" placeholder="Potvrdite novi password" name="password_confirmation" autocomplete="new-password" required>
                        </p>
                        <div class="w3-row">
                            <div class="w3-col m6 l6">
                                <button class="w3-button w3-block w3-blue w3-hover-orange w3-section w3-padding w3-tiny" type="submit">Snimi novi password</button>
                            </div>
                            <div class="w3-col m6 l6">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="w3-col w3-container m1 l1">
    </div>
</div>
@endsection