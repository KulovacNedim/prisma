@extends('layouts.app')

@section('content')
<div class="w3-row">
  <div class="w3-col w3-container">
    @include('partials.alerts')
  </div>
</div>

<div class="w3-row w3-margin-bottom  w3-text-dark-gray" style="margin-top: 30px;">
  <div class="w3-col w3-container l1">
  </div>
  <div class="w3-col w3-container l10">
    <div class="w3-row w3-large w3-bottombar w3-border-blue">
      <h1 class=" w3-large w3-col m9 l9" style="min-height: 40px; display: flex; align-items: center;">
        <b>LISTA ZA UPIT (Broj artikala: <span id="countHeader">{{ Cart::count() }}</span>)</b>
      </h1>
      <span class="w3-col m3 l3"><a href="{{ route('shop.index') }}"><button class="w3-button w3-amber w3-hover-blue w3-hide-medium" style="width: 100%; margin:7px 0">Nastavite kupovati</button></a></span>
      <span class="w3-col m3 l3"><a href="{{ route('shop.index') }}"><button class="w3-button w3-amber w3-hover-blue w3-small w3-hide-small w3-hide-large" style="width: 100%; margin:7px 0">Nastavite kupovati</button></a></span>
    </div>
    <div>
      <ul class="w3-ul" style="margin-top: 8px;">
        @foreach(Cart::content() as $item)
        <li class="w3-bar">
          <span onclick="this.parentElement.style.display='none'" class="w3-right">
            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" class="w3-button w3-bar-item w3-small w3-hide-small w3-blue w3-hover-red">X</button>
            </form>
          </span>


          <div class="w3-hide-small">
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
          </div>
          <div class="w3-hide-medium w3-hide-large w3-row">
            <div class="w3-col s5">{{ $item->model->name }}</div>
            <div class="w3-col s3"><input type="text" value="{{ $item-> qty }}" data-id="{{ $item->rowId }}" class="quantity" style="width: 60px; text-align: right"></div>
            <div class="w3-col s3">{{ $item->subtotal }} KM</div>
            <div class="w3-col s1">
              <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit" class="w3-button  w3-tiny w3-blue w3-hover-red" style="padding: 7px 15px;">X</button>
              </form>
            </div>
          </div>

        </li>
        @endforeach
      </ul>
    </div>
    @if (Cart::count() > 0)
    <div class="w3-row w3-large w3-blue w3-margin-top w3-center">
      <div class="w3-col m6 l6">
        <p>Total: {{ Cart::subtotal() }} KM</p>
      </div>
      <div class="w3-col m6 l6" style="min-height: 60px; display: flex; align-items:center; justify-content: center;">
        <a href="{{ route('checkout.index') }}"><button class="w3-button w3-amber w3-hide-medium w3-hover-blue">Pošalji upit</button></a>
        <a href="{{ route('checkout.index') }}"><button class="w3-button w3-small w3-hide-small w3-hide-large w3-amber w3-hover-blue">Pošalji upit</button></a>
      </div>
    </div>
    @endif
    <div>
      @if (Cart::count() == 0)
      <div class="w3-panel w3-blue">
        <p>Trenutno nema artikala na listi. <a href="{{ route('shop.index') }}" style="text-decoration: underline;">Započnite kupovinu!</a></p>
      </div>
      @endif
    </div>

  </div>
  <div class="w3-col w3-container l1">
  </div>
</div>

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
          axios.patch(`/cart/${id}`, {
              quantity: that.value
            })
            .then(function(res) {
              var x = document.getElementsByClassName("count");
              for (var i = 0; i < x.length; i++) {
                x[i].innerHTML = res.data.quantity;
              }
              document.getElementById('countHeader').innerHTML = res.data.quantity;
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