@extends('layouts.app')

@section('content')
<div class="w3-row">
    <div class="w3-col w3-container m1 l1">
    </div>

    <div class="w3-col w3-container m10 l10 w3-padding ">
        <div class="w3-row w3-card w3-margin-top">
            <div class="w3-col w3-container l7 w3-margin-top w3-padding ">
                <div class="w3-margin"><br>
                    <h3>RESET PASSWORDA</h3>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form class="w3-container" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="w3-section">
                        <label><b>e-mail adresa</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Unesite e-mail adresu" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <button class="w3-button w3-block w3-blue w3-small w3-hover-orange w3-hover-text-white w3-section w3-padding" type="submit">Pošalji novi password</button>
                    </div>
                </form>
            </div>
            <div class="w3-col w3-container l5 w3-margin-top w3-margin-bottom w3-padding w3-border-left" style="min-height: 260px;">
                <div class="w3-container w3-margin">
                    <div class="w3-margin-top"><br>
                        <b>
                            <p>Već znate svoj password?</p>
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