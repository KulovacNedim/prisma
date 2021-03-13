@extends('layouts.app')

@section('content')
<div class="w3-row w3-margin-top w3-margin-bottom">
  <div class="w3-col w3-container l1 ">
  </div>
  <div class="w3-col w3-container l10 w3-text-dark-gray">
    <div class="w3-row">


      <div class="w3-col l4 w3-padding w3-hide-small w3-hide-medium">
        <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
          <h3 class="w3-large w3-text-dark-gray"><b>KONTAKT FORMA</b></h3>
        </div>
        <div class="w3-col">
          <span class="">
            @include('partials.contact-form')
          </span>
        </div>
      </div>

      <div class="w3-col l8 w3-padding">
        <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
          <h3 class="w3-large w3-text-dark-gray"><b>NAŠE LOKACIJA</b></h3>
        </div>
        <div class="w3-row w3-margin-top">
          <div class="w3-row" style="overflow: auto;">
            <table class="w3-table-all" style="border: none;">
              <thead>
                <tr class="w3-light-grey">
                  <th></th>
                  <th>{{ strtoupper($sailPoints[0]->title) }}</th>
                  <th>{{ strtoupper($sailPoints[1]->title) }}</th>
                </tr>
              </thead>
              <tr>
                <th>Adresa</th>
                <td>{{ $sailPoints[0]->address }}</td>
                <td>{{ $sailPoints[1]->address }}</td>
              </tr>
              <tr>
                <th>Telefon veleprodaja</th>
                <td>{{ $sailPoints[0]->phone_wholesale }}</td>
                <td>{{ $sailPoints[1]->phone_wholesale }}</td>
              </tr>
              <tr>
                <th>Telefon maloprodaja</th>
                <td>{{ $sailPoints[0]->phone_retail }}</td>
                <td>{{ $sailPoints[1]->phone_retail }}</td>
              </tr>
              <tr>
                <th>e-mail</th>
                <td>{{ $sailPoints[0]->email }}</td>
                <td>{{ $sailPoints[1]->email }}</td>
              </tr>
              <tr>
                <th>Radno vrijeme</th>
                <td>{!! $sailPoints[0]->work_hours !!}</td>
                <td>{!! $sailPoints[1]->work_hours !!}</td>
              </tr>
            </table>
          </div>
          <div class="w3-row w3-margin-top">
            <img src="{{ asset('img/map.png') }}" alt="mapa" style="width: 100%;">
          </div>
          <div class="w3-col w3-hide-large">
            <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
              <h3 class="w3-large w3-text-dark-gray"><b>KONTAKT FORMA</b></h3>
            </div>
            <div class="w3-col">
              <span class="">
                @include('partials.contact-form')
              </span>
            </div>
          </div>
        </div>

      </div>


    </div>

  </div>
  <div class="w3-col w3-container l1 ">
  </div>
</div>

@endsection