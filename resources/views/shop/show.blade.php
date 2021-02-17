@extends('layouts.app')

@section('title')
| {{ $product->name }}
@endsection

@section('content')
<div class="w3-row">
  <div class="w3-col w3-container m1 l1 ">
  </div>
  <div class="w3-col w3-container m5 l5">
    <div class="w3-card e3-blue" style="width:100%; max-height:500px; overflow: hidden;">
      <img style="object-fit: scale-down; object-position: center; max-height: 500px; width: 100%;" src="{{ pathinfo('img/products/'.$product->imageUrl.'.jpg', PATHINFO_EXTENSION) == 'jpg' ? asset('img/products/'.$product->imageUrl.'.jpg') : (pathinfo('img/products/'.$product->imageUrl.'.jpg', PATHINFO_EXTENSION) == 'jpeg' ? asset('img/products/'.$product->imageUrl.'.jpeg') : asset('img/products/'.$product->imageUrl.'.png')) }}" alt="{{ $product->name }}" style="width:100%">
    </div>
  </div>
  <div class="w3-col w3-container m5 l5 ">
    <h1 style="font-weight: bold;">{{ $product->name }}</h1>
    <div style="margin-top: 35px;">
      <span class="w3-text-gray;">{{ $product->shortDescription}}</span>
      <h1 style="margin-top: 0; font-weight:bold">{{ $product->presentPrice() }}</h1>
    </div>

    <p style="margin-top: 25px;">{{ $product->description }}</p>
    <button class="w3-button w3-red w3-hover-yellow " style="width: 100%; margin-top:25px">Dodaj na listu za upit</button>
  </div>
  <div class="w3-col w3-container m1 l1">
  </div>
</div>

@endsection