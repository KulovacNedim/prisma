<div class="w3-border w3-round" style="overflow: hidden; position:relative">
  @if($product->is_discount)
  <div style="position: absolute;top:7px; left:5px"><span class="w3-wide w3-tag w3-padding w3-round-large w3-orange w3-text-white w3-center w3-animate-left">AKCIJA!!!</span></div>
  @endif
  <img width="100%" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
  <div class="w3-container">
    <div class="">
      <b>
        <p class="w3-left-align" style="margin-bottom: 8px;">{{ $product->name }}</p>
      </b>
    </div>
    <div class="w3-row w3-margin-bottom">
      @if($product->new_price)
      <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center"><span class="w3-text-gray" style="margin-right: 10px;"><s>{{ $product->price }} </s></span>{{ $product->presentNewPrice() }}</span></div>
      @else
      <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center">{{ $product->presentPrice() }}</span></div>
      @endif
      <div class="w3-col s4 m4 l4">
        <form action="{{ route('cart.store') }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $product->id }}" />
          <input type="hidden" name="name" value="{{ $product->name }}" />
          <input type="hidden" name="price" value="{{ $product->price }}" />
          <!-- <button class="w3-button w3-xlarge w3-teal">+</button> -->
          <button class="w3-button w3-blue w3-hover-red w3-right" type="submit"><i class="fas fa-cart-plus"></i></button>
        </form>
      </div>
    </div>

  </div>
</div>