@extends('layouts.app')

@section('title')
| {{ $product->name }}
@endsection

@section('content')
<div class="w3-row w3-margin-bottom ">
  <div class="w3-col w3-container l1">
  </div>
  <div class="w3-col w3-container l10">
    <div class="w3-display-container">
      <span class="w3-hide-small">
        @include('partials.product-show-image')
      </span>

      <div class="w3-col w3-container m7 l7 w3-text-dark-gray" style="position: relative;">
        <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
          <h1 class="w3-xlarge w3-text-dark-gray"><b>{{ strtoupper($product->name) }}</b></h1>
        </div>
        <div style="display: flex;">
          <span class="w3-text-dark-gray w3-container" style="float: left; margin-top: 5px">{{ $product->shortDescription}}</span>
        </div>
        <div class="w3-hide-large w3-hide-medium w3-margin-top">
          @include('partials.product-show-image')
        </div>
        <div class="w3-container" style="display:flex; align-items: start; justify-content: start; margin-top: 35px;">
          <b>
            @if($product->brand)
            <p class="w3-large">BRAND: {{ $product->brand }}</p>
            @endif
          </b>
        </div>
        <div class="w3-container" style="display:flex; align-items: start; justify-content: start;">
          <div style="margin-top: 5px;">
            @if($product->is_discount)
            <h1 style="margin-top: 10px; font-weight:bold; "><s style="margin-right:20px">{{ $product->presentPrice() }}</s> <span class="w3-text-red ">{{ $product->presentNewPrice() }}</span></h1>
            @else
            <h1 style="margin-top: 0; font-weight:bold">{{ $product->presentPrice() }}</h1>
            @endif
          </div>
        </div>
        <div class="w3-container">
          <p style="margin-top: 25px;">{!! $product->description !!}</p>
        </div>
        <div class="w3-container w3-center">
          <button class="w3-button w3-blue w3-hover-red  click" type="button" data-id="{{ $product->id }}">Dodaj na listu za upit</button>
        </div>

        @if($product->is_discount)
        <div style="position: absolute;top:80px; right: 12px;">
          <span class="w3-wide w3-tag w3-padding w3-round-large w3-large w3-orange w3-text-white w3-center w3-animate-left">AKCIJA!!!</span>
        </div>
        @endif

      </div>
    </div>
  </div>
  <div class="w3-col w3-container l1">
  </div>
</div>

<div class="w3-row w3-margin-bottom w3-light-gray" style="margin-top: 30px;">
  <div class="w3-col w3-container l1">
  </div>
  <div class="w3-col w3-container l10">
    <div class="w3-container w3-large w3-bottombar w3-border-blue" style="min-height: 50px; display:flex; align-items: center; margin-top:15px;">
      <h1 class="w3-large w3-text-dark-gray"><b>Možda Vas zanimaju i sljedeći artikli</b></h1>
    </div>
    <div class="" style="display: flex; flex-wrap: wrap;justify-content:space-around">
      @foreach($mightAlsoLike as $product)
      <a href="{{ route('shop.show', [$product->id, $product->slug]) }}">
        <div style="max-width: 200px; margin-top: 16px">
          @include('partials.product-card')
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <div class="w3-col w3-container l1">
  </div>
</div>

@endsection

@section('extra-js')
<script>
  function currentSlide(n) {
    showSlide(slideIndex = n);
  }

  function showSlide(n) {
    var i;
    var slides = document.getElementsByClassName("productSlides");
    var thumbs = document.getElementsByClassName("thumb");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < thumbs.length; i++) {

      if (thumbs[i].classList.contains("w3-border-blue")) {
        thumbs[i].className = thumbs[i].className.replace(" w3-border-blue", " w3-border-light-grey");
      }
    }
    slides[slideIndex - 1].style.display = "block";
    if (thumbs[slideIndex - 1].classList.contains("w3-border-light-grey")) {
      thumbs[slideIndex - 1].className = thumbs[slideIndex - 1].className.replace("w3-border-light-grey", "w3-border-blue");
    }
  }
</script>
@endsection