@extends('layouts.app')

@section('content')
<div class="w3-row w3-margin-top w3-margin-bottom">
  <div class="w3-col w3-container l1 ">
  </div>
  <div class="w3-col w3-container l10 w3-text-dark-gray">


    <div class="w3-col">
      <div class="w3-col l4 w3-padding w3-hide-small w3-hide-medium" style="text-align: justify;">
        @if($info->mission && $info->vision)
        <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
          <h3 class="w3-large w3-text-dark-gray"><b>MISIJA I VIZIJA</b></h3>
        </div>
        <p><b>Misija:</b> {{ $info->mission }}</p>
        <p><b>Vizija:</b> {{ $info->vision }}</p>
        @endif
        <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
          <h3 class="w3-large w3-text-dark-gray"><b>RAZVOJ</b></h3>
        </div>
        {!! $info->history !!}
      </div>
      <div class="w3-col l8 w3-padding">
        <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
          <h3 class="w3-large w3-text-dark-gray"><b>KOMPANIJA</b></h3>
        </div>
        <div class="w3-row w3-margin-top">
          <table class="w3-table-all" style="border: none;">
            <thead>
              <tr class="w3-light-grey">
                <th>Naziv</th>
                <td>{{ $info->title }}</td>
              </tr>
            </thead>
            @foreach($sailPoints as $sailPoint)
            <tr>
              @if($loop->index == 0)
              <th>Poslovnice</th>
              @else
              <th></th>
              @endif
              <td>{{ $sailPoint->title }}</td>
            </tr>
            @endforeach
            <tr>
              <th>ID BROJ</th>
              <td>{{ $info->id_registratiton }} <a href="{{ asset('storage/'.json_decode($info->id_pdf)[0]->download_link) }}" target="_blank" style="float: right;"><span class="w3-button w3-blue w3-hover-red w3-tiny">PDF</span></a></td>
            </tr>
            <tr>
              <th>PDV BROJ</th>
              <td>{{ $info->pdv_registratiton }} <a href="{{ asset('storage/'.json_decode($info->pdv_pdf)[0]->download_link) }}" target="_blank" style="float: right;"><span class="w3-button w3-blue w3-hover-red w3-tiny">PDF</span></a></td>
            </tr>
            <tr>
              <th>SUDSKI REGISTAR</th>
              <td>{{ $info->court_register }}</td>
            </tr>
            @foreach($banks as $bank)
            <tr>
              @if($loop->index == 0)
              <th>Poslovne banke</th>
              @else
              <th></th>
              @endif
              <td>{{ $bank->bank_nubmer }} - {{ $bank->title }}</td>
            </tr>
            @endforeach
          </table>
          <div class="w3-container w3-large w3-bottombar w3-border-blue w3-margin-top" style="height: 50px; display:flex; align-items: center">
            <h3 class="w3-large w3-text-dark-gray"><b>PRODAJNA MJESTA</b></h3>
          </div>
          <div class="w3-margin-top" style="display: flex; justify-content: space-around; flex-wrap: wrap;">
            @foreach($sailPoints as $sailPoint)
            <div class="w3-center w3-light-gray" style="min-width: 300px; margin-top: 8px;">
              <img width=" 100%" src="{{ productImage($sailPoint->image) }}" alt="{{ $sailPoint->name }}">
              <p>{{ $sailPoint->title }} </p>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="w3-padding w3-hide-large" style="text-align: justify;">
        @if($info->mission && $info->vision)
        <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
          <h3 class="w3-large w3-text-dark-gray"><b>MISIJA I VIZIJA</b></h3>
        </div>
        <p><b>Misija:</b> {{ $info->mission }}</p>
        <p><b>Vizija:</b> {{ $info->vision }}</p>
        @endif
        <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
          <h3 class="w3-large w3-text-dark-gray"><b>RAZVOJ</b></h3>
        </div>
        {!! $info->history !!}
      </div>

    </div>
  </div>
  <div class="w3-col w3-container l1 ">
  </div>
</div>

@include('partials.footer')

@endsection