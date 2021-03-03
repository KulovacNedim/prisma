@extends('layouts.app')

@section('content')

<div class="w3-row">
  <div class="w3-col w3-container m1 l1 ">
  </div>
  <div class="w3-col w3-container m10 l10">
    <div class="w3-row">
      <div class="w3-row">
        <div class="w3-col w3-container m10 l10">
          <b>
            <h4>Lista za upit
              @if (Cart::count() == 1)
              ({{ Cart::count() }} artikal na listi)
              @elseif (Cart::count() > 0)
              ({{ Cart::count() }} artikala na listi)
              @endif
            </h4>
          </b>
        </div>
        <div class="w3-col w3-container m2 l2">
          @if (Cart::count() > 0)
          <a href="{{ route('shop.index') }}"><button class="w3-button w3-blue w3-hover-orange" style="width: 100%; margin:7px 0">Nastavite kupovati</button></a>
          @endif
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-col w3-container">
          @include('partials.alerts')
          <!-- @if(count($errors) > 0)
          <div>
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif -->
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-rest w3-container">
          @if (Cart::count() == 0) <p style="display: inline-block; margin-right: 20px">Trenutno nema artikala na listi.</p><a href="{{ route('shop.index') }}" class="w3-button w3-blue w3-hover-orange">Nastavite kupovati</a>
          @endif
        </div>
      </div>
    </div>
    <div class="w3-row">
      <ul class="w3-ul w3-card-4" style="margin-top: 15px;">
        @foreach(Cart::content() as $item)
        <li class="w3-bar">
          <span onclick="this.parentElement.style.display='none'" class="w3-right">
            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="w3-button w3-bar-item w3-small w3-blue">X</button>
            </form>
          </span>
          <a href="{{ route('shop.show', [$item->model->id, $item->model->slug]) }}">
            <img class="w3-bar-item w3-hide-small w3-left" style="width:85px" src="{{ productImage($item->model->image) }}" alt="{{ $item->model->name }}">
            <div class="w3-bar-item w3-left">
              <span class="w3-large">{{ $item->model->name }}</span><br>
              <span class="w3-hide-small">{{ $item->model->shortDescription }}</span>
            </div>
          </a>
          <div class="w3-bar-item w3-right" style="min-width: 130px">
            <span class="w3-large w3-right">{{ $item->subtotal }} KM</span>
          </div>
          <div class="w3-bar-item w3-right">
            <span class="w3-large">
              <input type="text" value="{{ $item-> qty }}" data-id="{{ $item->rowId }}" class="quantity" style="width: 80px; text-align: right">
            </span>
          </div>
        </li>
        @endforeach
      </ul>

      @if (Cart::count() > 0)
      <ul class="w3-ul w3-card-4" style="margin-top: 15px;">
        <li class="w3-bar">
          <div class="w3-bar-item w3-center" style="width: 100%;">
            <span class="w3-large">Total: {{ Cart::subtotal() }} KM</span><br>
            <span class="w3-small">Dostava 7 KM</span>
          </div>
          <div class="w3-bar-item w3-center" style="width: 100%;">
            <a href="{{ route('checkout.index') }}"><button class="w3-button w3-small w3-blue w3-hover-orange" style="padding: 10px;">Pošalji upit</button></a>
          </div>

          <!-- <div class="w3-bar-item">
            <span class="w3-large">Sa dostavom: {{ $priceWithDelivary }} KM</span>
          </div> -->
        </li>
      </ul>
      @endif
    </div>
  </div>
  <div class="w3-col w3-container m1 l1">
  </div>
</div>


@if (Cart::count() > 0)
<div class="w3-row" style="margin-top: 50px;">
  <div class="w3-col w3-container m1 l1 ">
  </div>
  <div class="w3-col w3-container w3- center m10 l10">
    <p>Možda Vas zanimaju i ovi proizvodi: </p>
    <div class="w3-container  w3-card">
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
@endif

@endsection

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
  (function() {
    const classname = document.querySelectorAll('.quantity')

    const articles = Array.from(classname);

    articles.forEach(function(elem) {
      elem.addEventListener('keyup', function() {

        const that = this;

        function timer() {
          const id = elem.getAttribute('data-id');
          console.log(that.value)
          axios.patch(`/cart/${id}`, {
              quantity: that.value
            })
            .then(function(res) {
              window.location.href = "{{ route('cart.index') }}"
            })
            .catch(function(err) {
              console.log(err);
            })
        }

        setTimeout(timer, 300);
      })
    })
  })();
</script>
@endsection