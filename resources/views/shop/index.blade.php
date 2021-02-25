@extends('layouts.app')

@section('content')
<div>
  <!-- Sidebar -->
  <nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-d3 w3-animate-left" id="categoriesSidebar">
    <a href="javascript:void(0)" onclick="w3_close_categories()" class="w3-right w3-xlarge w3-padding-large w3-hide-large" title="Close Menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4 class="w3-bar-item w3-white w3-theme-d3"><b>Kategorije</b></h4>
    @foreach($categories as $category)
    <a class="w3-bar-item w3-button w3-hover-orange {{ $category->name ==  $categoryName ? 'w3-orange' : ''  }}" href="{{ route('shop.index', ['id' => $category->id, 'category' => $category->slug]) }}">{{ $category->name }}</a>
    @endforeach
  </nav>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close_categories()" style="cursor:pointer" title="close side menu" id="categoriesOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <button class="w3-button w3- w3-hide-large w3-yellow w3-bottom w3-small" style="width: 100%;" onclick="w3_open_categories()">Sve kategorije</button>

  <div class="w3-row">
    <div class="w3-container">
      <h2>{{ $categoryName }}</h2>
      @forelse($products as $product)
      <a href="{{ route('shop.show', [$product->id, $product->slug]) }}">
        <div class="w3-col w3-container m4 l3 w3-padding-16 ">
          <div class="w3-card-4 m5 l5">

            <img width="100%" src="{{ pathinfo('img/products/'.$product->imageUrl.'.jpg', PATHINFO_EXTENSION) == 'jpg' ? asset('img/products/'.$product->imageUrl.'.jpg') : (pathinfo('img/products/'.$product->imageUrl.'.jpg', PATHINFO_EXTENSION) == 'jpeg' ? asset('img/products/'.$product->imageUrl.'.jpeg') : asset('img/products/'.$product->imageUrl.'.png')) }}" alt="{{ $product->name }}">
            <div class="w3-container w3-center">
              <b>
                <p class="w3-left-align">{{ $product->name }}</p>
              </b>
              <div class="w3-section w3-left-align">
                <span>{{ $product->presentPrice() }}</span>
                <span style="float: right;">
                  <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}" />
                    <input type="hidden" name="name" value="{{ $product->name }}" />
                    <input type="hidden" name="price" value="{{ $product->price }}" />
                    <button class="w3-button w3-blue w3-hover-amber w3-tiny" type="submit">Dodaj na listu za upit</button>
                  </form>
                </span>
              </div>

            </div>
          </div>
        </div>
      </a>
      @empty
      <div>Kategorija trenutno ne sadrži artikle</div>
      @endforelse

    </div>
    {{ $products->appends(request()->input())->links() }}
  </div>

  <!-- END MAIN -->
</div>

<script>
  // Get the Sidebar
  var mySidebar = document.getElementById("categoriesSidebar");

  // Get the DIV with overlay effect
  var overlayBg = document.getElementById("categoriesOverlay");

  // Toggle between showing and hiding the sidebar, and add overlay effect
  function w3_open_categories() {
    if (categoriesSidebar.style.display === 'block') {
      categoriesSidebar.style.display = 'none';
      overlayBg.style.display = "none";
    } else {
      categoriesSidebar.style.display = 'block';
      overlayBg.style.display = "block";
    }
  }

  // Close the sidebar with the close button
  function w3_close_categories() {
    categoriesSidebar.style.display = "none";
    overlayBg.style.display = "none";
  }
</script>




@endsection