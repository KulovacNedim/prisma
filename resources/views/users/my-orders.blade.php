@extends('layouts.app')

@section('content')
<div class="w3-col w3-container l1 ">
</div>
</div>
@include('partials.my-profile-menu')

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px; position: relative;">
  <div class="w3-row">
    <div class="w3-col l1"></div>
    <div class="w3-col l11 w3-margin-left">
      <div class="">
        <div class="w3-container w3-large w3-blue" style="height: 50px; display:flex; align-items: center">
          POSLANI UPITI
        </div>
        <div class="w3-row-padding">
          <div class="w3-row w3-margin-top" style="overflow: auto;">
            <table class="w3-table-all" style="border: none;">
              <thead>
                <tr class="w3-light-grey">
                  <th>Datum upita</th>
                  <th class="w3-hide-small">Grad</th>
                  <th class="w3-hide-small">Adresa</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              @foreach($orders as $order)
              <tr>
                <td>{{ $order->created_at }}</td>
                <td class="w3-hide-small">{{ $order->billing_city }}</td>
                <td class="w3-hide-small">{{ $order->billing_address }}</td>
                <td>{{ $order->billing_total }}</td>
                <td><a href="{{ route('orders.show', $order->id) }}" class="w3-button w3-blue w3-hover-red w3-small" style="float: right;">PREGLED UPITA</a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="w3-col l1"></div>
  </div>

  <button onclick="w3_open_profile()" class="w3-button w3-circle w3-red w3-hover-red w3-text-white w3-hide-large" style="position: fixed;bottom: 35px; right: 20px;"><i class="fas fa-user" style="margin-right: 5px;"></i></button>


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