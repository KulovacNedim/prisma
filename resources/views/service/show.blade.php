@extends('layouts.app')

@section('content')
<div class="w3-row w3-margin-bottom ">
  <div class="w3-col w3-container l1">
  </div>
  <div class="w3-col w3-container l10">
    <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
      <h1 class="w3-xlarge w3-text-dark-gray"><b>{{ strtoupper($service->title) }}</b></h1>
    </div>
    <div class="w3-row w3-margin-top">
      @if($service->image)
      <div class="w3-col w3-container l5 w3-text-dark-gray" style="position: relative;">
        <img width="100%" src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}">
      </div>
      <div class="w3-col w3-container l7 w3-text-dark-gray" style="position: relative;">
        <div class="w3-container">
          {!! $service->description !!}
        </div>
      </div>
      @else
      <div class="w3-col w3-container w3-text-dark-gray" style="position: relative;">
        <div class="w3-container">
          {!! $service->description !!}
        </div>
      </div>
      @endif
    </div>
  </div>
  <div class="w3-col w3-container l1">
  </div>
</div>


@endsection