@extends('layouts.app')

@section('content')
<div class="w3-row w3-center">
  <h2 class="w3-margin-top w3-padding">Hvala!</h2>
  <h5 class="w3-margin-top w3-padding">Vaš upit je zaprimljen. Odgovor na upit možete očekivati veoma brzo.</h5>
  <h5 class="">Konfirmacijski email je poslan na Vašu email adresu</h5>
  <a href="{{ route('welcome')}}">
    <button class="w3-button w3-blue w3-hover-orange" style="margin-top:25px; margin-bottom:25px">Početna stranica</button>
  </a>
</div>
@endsection