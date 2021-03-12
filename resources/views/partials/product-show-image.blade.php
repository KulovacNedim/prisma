<div class="w3-col w3-container m5 l5">
  @if ($product->images)
  <div class="" style="width:100%; max-height:800px; overflow: hidden;">
    <div class="w3-content w3-border w3-round">
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
  <img class="w3-border w3-round" style="object-fit: scale-down; object-position: center; max-height: ; width: 100%;" src="{{ productImage($product->image) }}" alt="{{ $product->name }}" style="width:100%">
  @endif
</div>