@extends('layouts.app')

@section('title')
| {{ $product->name }}
@endsection

@section('content')
<div class="w3-row">
  <div class="w3-col w3-container m1 l1 ">
  </div>
  <div class="w3-col w3-container m10 l10  w3-card">
    <div class="w3-col w3-container m5 l5">
      <div class="" style="width:100%; max-height:500px; overflow: hidden;">
        <img style="object-fit: scale-down; object-position: center; max-height: 500px; width: 100%;" src="{{ productImage($product->image) }}" alt="{{ $product->name }}" style="width:100%">
      </div>
    </div>
    <div class="w3-col w3-container m5 l5 ">
      <h1 style="font-weight: bold;">{{ $product->name }}</h1>
      <div style="margin-top: 35px;">
        <span class="w3-text-gray;">{{ $product->shortDescription}}</span>
        <h1 style="margin-top: 0; font-weight:bold">{{ $product->presentPrice() }}</h1>
      </div>

      <p style="margin-top: 25px;">{!! $product->description !!}</p>
      <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}" />
        <input type="hidden" name="name" value="{{ $product->name }}" />
        <input type="hidden" name="price" value="{{ $product->price }}" />
        <button class="w3-button w3-blue w3-hover-orange" style="width: 100%; margin-top:25px" type="submit">Dodaj na listu za upit</button>
      </form>
    </div>
  </div>
  <div class="w3-col w3-container m1 l1">
  </div>
</div>

<div class="w3-row" style="margin-top: 30px;">
  <div class="w3-col w3-container m1 l1 ">
  </div>
  <div class="w3-col w3-container w3- center m10 l10 w3-card">
    <p>Možda Vas zanimaju i ovi proizvodi: </p>
    <div class="w3-container">
      @foreach($mightAlsoLike as $product)
      <a href="{{ route('shop.show', [$product->id, $product->slug]) }}">
        <div class="w3-col w3-container m4 l3 w3-padding-16 ">
          <div class="w3-card-4 m5 l5">

            <img style="width: 100%;" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
            <div class="w3-container w3-center">
              <b>
                <p class="w3-left-align">{{ $product->name }}</p>
              </b>
              <div class="w3-section w3-left-align">
                <span>{{ $product->presentPrice() }}</span>
              </div>

            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <div class="w3-col w3-container m1 l1">
  </div>
</div>

@endsection