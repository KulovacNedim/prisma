<div class="w3-border w3-round" style="overflow: hidden; position:relative;box-sizing: border-box;">
  @if($product->is_discount)
  <div style="position: absolute;top:7px; left:5px"><span class="w3-wide w3-tag w3-padding w3-round-large w3-orange w3-text-white w3-center w3-animate-left">AKCIJA!!!</span></div>
  @endif

  <img src="{{ productImage($product->image) }}" alt="{{ $product->name }}" style="background-color: #fff;width: 100%;height: 250px;object-fit: scale-down;display: block;">

  <div style="height: 80px; line-height: 1.5;font-size: 0.9em;padding: 15px;background: #fcfcfc;">
    <b>
      <p class="w3-left-align" style="margin-bottom: 8px;">{{ $product->name }}</p>
    </b>
  </div>

  <div style="padding: 15px;display: flex;justify-content: space-between;align-items: center;color: inherit;background: #fafafa;font-size: 0.8em;">
    @if($product->new_price)
    <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center"><span class="w3-text-gray" style="margin-right: 10px;"><s>{{ $product->presentPrice() }} </s></span>{{ $product->presentNewPrice() }}</span></div>
    @else
    <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center">{{ $product->presentPrice() }}</span></div>
    @endif
    <div class="w3-col s4 m4 l4">
      <button class="w3-button w3-blue w3-hover-red w3-right click" type="button" data-id="{{ $product->id }}" style="z-index: 999;"><i class="fas fa-cart-plus"></i></button>
    </div>
  </div>


</div>

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
  (function() {
    const clickClassName = document.querySelectorAll('.click');
    const clickBtns = Array.from(clickClassName);
    clickBtns.forEach(child => {
      child.addEventListener('click', (e) => {
        e.stopPropagation();
        e.preventDefault();
        const id = child.getAttribute('data-id');
        axios.post(`/cart`, {
            id: id
          })
          .then(function(res) {
            var x = document.getElementsByClassName("count");
            for (var i = 0; i < x.length; i++) {
              if (!x[i].classList.contains('w3-badge')) {
                x[i].className += " w3-badge";
              }
              x[i].innerHTML = res.data.quantity;
            }

            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              icon: 'success',
              title: 'Artikal dodan na listu',
            })

          })
          .catch(function(err) {
            console.log(err);
          })
      })
    });
  })();
</script>
@endsection