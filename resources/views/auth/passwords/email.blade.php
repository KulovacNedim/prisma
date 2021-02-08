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

                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Pošalji novi password</button>
                    </div>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey w3-hide-small">
                    <span class="w3-left w3-padding s6"><a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Forma za login') }}
                        </a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection