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
      @if ($product->images)
      <div class="" style="width:100%; max-height:800px; overflow: hidden;">
        <div class="w3-content" style="width: 100%">
          @foreach(json_decode($product->images, true) as $image)
          @if($loop->index == 0)
          <img class="productSlides w3-animate-bottom" src="{{ productImage($image) }}" style="width:100%;">
          @else
          <img class="productSlides w3-animate-bottom" src="{{ productImage($image) }}" style="width:100%;display:none">
          @endif
          @endforeach
          <div class="w3-row-padding w3-section">
            @foreach(json_decode($product->images, true) as $image)
            @if($loop->index == 0)
            <div class="w3-col s4">
              <img class="thumb w3-border-blue w3-bottombar" src="{{ productImage($image) }}" style="padding: 3px 0; width:100%;cursor:pointer; object-fit: scale-down; object-position: center; max-height: 100px; width: 100%;" onclick="currentSlide({{ $loop->index + 1 }})">
            </div>
            @else
            <div class="w3-col s4">
              <img class="thumb w3-border-light-grey w3-bottombar" src="{{ productImage($image) }}" style="padding: 3px 0; width:100%; cursor:pointer; object-fit: scale-down; object-position: center; max-height: 100px; width: 100%;" onclick="currentSlide({{ $loop->index + 1 }})">
            </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
      @else
      <img style="object-fit: scale-down; object-position: center; max-height: 500px; width: 100%;" src="{{ productImage($product->image) }}" alt="{{ $product->name }}" style="width:100%">
      @endif
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