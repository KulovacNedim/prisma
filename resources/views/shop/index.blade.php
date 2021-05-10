@extends('layouts.app')

@section('content')

<div>
  <!-- Sidebar -->
  <nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-animate-left" id="categoriesSidebar" style="padding-top: 20px;">

    <div class="w3-container w3-large w3-red" style="height: 50px; display:flex; align-items: center; position:relative;">
      KATEGORIJE
      <a href="javascript:void(0)" onclick="w3_close_categories()" class="w3-right w3-padding-large w3-hide-large" title="Close Menu" style="position: absolute; right: 0px">
        <i class="fa fa-remove"></i>
      </a>
    </div>
    <ul class="w3-ul w3-hoverable w3-large">
      @foreach($categories as $category)
      <a href="{{ route('shop.index', ['id' => $category->id, 'category' => $category->slug]) }}">
        <li style="text-align: left; position:relative;" class="w3-hover-red w3-border-bottom {{ $category->name ==  $categoryName ? 'w3-red' : ''  }}">{{$category->name}} <i class="fas fa-angle-double-right w3-text-white" style="position: absolute;right:12px;top:12px;"></i></li>
      </a>
      @endforeach
    </ul>
  </nav>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class=" w3-overlay w3-hide-large" onclick="w3_close_categories()" style="cursor:pointer" title="close side menu" id="categoriesOverlay">
</div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:260px; position: relative;">
  <div class="w3-container">
    <div class="w3-col l11 ">
      <div class="w3-row">
        <div class="w3-container w3-large w3-blue" style="height: 50px; display:flex; align-items: center">
          {{ strtoupper($categoryName) }}
        </div>
        <div style="padding-top: 20px; margin: 0 auto; display: grid;grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));grid-auto-rows: auto;gap: 20px;">
          @forelse($products as $product)
          <a href="{{ route('shop.show', [$product->id, $product->slug]) }}">
            @include('partials.prod-card')
          </a>
          @empty
          <div>Kategorija trenutno ne sadrži artikle</div>
          @endforelse
        </div>
      </div>
    </div>
    <div class="w3-col l1"></div>
  </div>

  <button onclick="w3_open_categories()" class="w3-button w3-circle w3-red w3-hover-red w3-text-white w3-hide-large" style="position: fixed;bottom: 20px; right: 20px;">Kategorije</button>

  <div class="w3-row">
    <div class=" w3-col l11 w3-center w3-margin-top w3-margin-bottom">
      {{ $products->appends(request()->input())->links() }}
    </div>
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