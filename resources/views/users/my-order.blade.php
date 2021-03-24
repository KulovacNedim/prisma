@extends('layouts.app')

@section('content')

@include('partials.my-profile-menu')

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:260px; position: relative;">
  <div class="w3-row">
    <div class="w3-col l11">
      <div class="w3-row">
        <div class="w3-container w3-large w3-blue" style="height: 50px; display:flex; align-items: center">
          UPIT BROJ: #{{ $order->id }}
        </div>
        <div class="w3-row-padding">
          <div class="w3-row w3-margin-top">
            <p>Vrijeme upita: {{ $order->created_at }}</p>
            <p>Addresa: {{ $order->billing_address }}, {{ $order->billing_postalCode }}, {{ $order->billing_city }}</p>
            <p>Telefon: {{ $order->billing_phone }}</p>

            <table class="w3-table-all" style="border: none;">
              <thead>
                <tr class="w3-light-grey">
                  <th>Artikal</th>
                  <th>Cijena</th>
                  <th>Količina</th>
                </tr>
              </thead>
              @foreach($products as $product)
              <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="w3-col l1"></div>
  </div>

  <button onclick="w3_open_profile()" class="w3-button w3-circle w3-red w3-hover-red w3-text-white w3-hide-large" style="position: fixed;bottom: 35px; right: 20px;"><i class="fas fa-user"></i></button>


  <!-- END MAIN -->
</div>

<script>
  // Get the Sidebar
  var profileSidebar = document.getElementById("profileSidebar");

  // Get the DIV with overlay effect
  var profileOverlayBg = document.getElementById("profileOverlay");

  // Toggle between showing and hiding the sidebar, and add overlay effect
  function w3_open_profile() {
    if (profileSidebar.style.display === 'block') {
      profileSidebar.style.display = 'none';
      profileOverlayBg.style.display = "none";
    } else {
      profileSidebar.style.display = 'block';
      profileOverlayBg.style.display = "block";
    }
  }

  // Close the sidebar with the close button
  function w3_close_profile() {
    profileSidebar.style.display = "none";
    profileOverlayBg.style.display = "none";
  }
</script>




@endsection