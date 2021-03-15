<div>
  <!-- Sidebar -->
  <nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-animate-left" id="profileSidebar" style="padding-top: 19px;">

    <div class="w3-container w3-large w3-red" style="height: 50px; display:flex; align-items: center; position:relative;">
      MENU
      <a href="javascript:void(0)" onclick="w3_close_profile()" class="w3-right w3-padding-large w3-hide-large" title="Close Menu" style="position: absolute; right: 0px">
        <i class="fa fa-remove"></i>
      </a>
    </div>
    <ul class="w3-ul w3-hoverable w3-large">
      <a href="{{ route('users.edit') }}">
        <li style="text-align: left; position:relative;" class="w3-hover-red w3-border-bottom ">Moj profil <i class="fas fa-angle-double-right w3-text-white" style="position: absolute;right:12px;top:12px;"></i></li>
      </a>
      <a href="{{ route('orders.index') }}">
        <li style="text-align: left; position:relative;" class="w3-hover-red w3-border-bottom ">Moji upiti <i class="fas fa-angle-double-right w3-text-white" style="position: absolute;right:12px;top:12px;"></i></li>
      </a>
    </ul>
  </nav>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class=" w3-overlay w3-hide-large" onclick="w3_close_profile()" style="cursor:pointer" title="close side menu" id="profileOverlay">
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