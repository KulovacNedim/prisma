@extends('layouts.app')

@section('content')
<div class="w3-row w3-margin-top w3-margin-bottom">
  <div class="w3-col w3-container l1 ">
  </div>
  <div class="w3-col w3-container l10 w3-text-dark-gray">
    <div class="w3-row">
      <div class="w3-container w3-large w3-bottombar w3-border-blue" style="height: 50px; display:flex; align-items: center">
        <h3 class="w3-large w3-text-dark-gray"><b>REZULTATI PRETRAGE</b></h3>
      </div>
      <b>
        <p class="w3-text-dark-gray">{{ $products->total() }} rezultata za pojam '{{ request()->input('query') }}'</p>
      </b>
    </div>
    <div class="w3-row" style="margin-left: -16px; margin-right: -16px;">
      @forelse($products as $product)
      <a href="{{ route('shop.show', [$product->id, $product->slug]) }}">
        <div class="w3-col m6 l4 w3-padding">
          <div class="w3-row w3-light-gray">
            <div class="w3-col m5 w3-center w3-hide-small">
              <img height="160px" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="w3-col m7 w3-padding">
              <p>{{ $product->name }}</p>
              <p>{{ $product->shortDescription }}</p>
              @if($product->new_price)
              <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center"><span class="w3-text-gray" style="margin-right: 10px;"><s>{{ $product->presentPrice() }} </s></span>{{ $product->presentNewPrice() }}</span></div>
              @else
              <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center">{{ $product->presentPrice() }}</span></div>
              @endif

            </div>
          </div>
        </div>
      </a>
      @empty
      <p>Pretraga nije rezultirala uspjehom.</p>
      @endforelse
    </div>
    <div class="w3-row w3-center w3-margin-top">
      {{ $products->appends(request()->input())->links() }}
    </div>
  </div>
  <div class="w3-col w3-container l1 ">
  </div>
</div>



@endsection