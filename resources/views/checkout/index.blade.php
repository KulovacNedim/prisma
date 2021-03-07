@extends('layouts.app')

@section('content')
<div class="w3-row">
  <div class="w3-col w3-container m1 l1">
  </div>
  <div class="w3-col w3-container m10 l10 w3-margin w3-border-bottom">
    <h3>KONTAKT PODACI</h3>
  </div>
  <div class="w3-col w3-container m1 l1">
  </div>
</div>
<div class="w3-row">
  <div class="w3-col w3-container m1 l1">
  </div>
  <div class="w3-col w3-container m10 l10">
    <div class="w3-col w3-container l6 w3-margin-top">
      <div class="w3-container w3-blue">
        <h4>Lista za upit:</h4>
      </div>
      <div class="w3-container w3-card" style="height: 420px;">
        <div class="">
          <div class="w3-border-bottom ">
            <h4>Upit</h4>
          </div>
          <div class="w3-container">
            <p>Total: {{ Cart::subtotal() }} KM</p>
            <p>Ukupno stavki: {{ Cart::count() }}</p>
          </div>
          <div class="w3-border-bottom ">
            <h4>Dostava</h4>
          </div>
          <div class="w3-container">
            <p>Dostava se plaća dodatno 7 KM</p>
          </div>
          <div class="w3-border-bottom ">
            <h4>Info</h4>
          </div>
          <div class="w3-container">
            <p>Nakon što pošaljete upit, Vaš upit će biti pregledan i dobit ćete odgovor na e-mail adresu koju ste unesete.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="w3-col w3-container l6 w3-margin-top">
      <div class="w3-container w3-blue">
        <h4>Kontakt podaci</h4>
      </div>

      <form class="w3-container w3-card" style="height: 420px;" action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <p>
          @if(auth()->user())
          <input class="w3-input" type="text" placeholder="Ime i prezime" name="name" value="{{ auth()->user()->name  }}" required readonly>
          @else
          <input class="w3-input" type="text" placeholder="Ime i prezime" name="name" value="{{ old('name')  }}" required>
          @endif
        </p>
        <p>
          @if(auth()->user())
          <input class="w3-input" type="email" placeholder="e-mail adresa" name="email" value="{{ auth()->user()->email }}" required readonly>
          @else
          <input class="w3-input" type="email" placeholder="e-mail adresa" name="email" value="{{ old('email') }}" required>
          @endif
        </p>
        <p>
          <input class="w3-input" type="text" placeholder="Telefon" name="phone" value="{{ old('phone') }}" required>
        </p>
        <p>
          <input class="w3-input" type="text" placeholder="Kućna adresa" name="address" value="{{ old('address') }}" required>
        </p>
        <p>
          <input class="w3-input" type="text" placeholder="Poštanski broj" name="postalCode" value="{{ old('postalCode') }}" required>
        </p>
        <p>
          <input class="w3-input" type="text" placeholder="Grad" name="city" value="{{ old('city') }}" required>
        </p>
        <button class="w3-button w3-blue w3-hover-orange" style="width: 100%; margin-top:25px; margin-bottom:25px" type="submit">Pošalji upit</button>
      </form>
    </div>
  </div>
  <div class="w3-col w3-container m1 l1">
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