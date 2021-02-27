<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="{{ route('welcome') }}" class="w3-bar-item w3-button w3-wide">ELEKTROPRIZMA</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <!-- <div class="w3-dropdown-hover">
        <button class="w3-button w3-white"><i class="fas fa-lightbulb"></i> RASVJETA</button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
          <a href="#" class="w3-bar-item w3-button">Link 1</a>
          <a href="#" class="w3-bar-item w3-button">Link 2</a>
          <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>
      </div> -->
      <!-- <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-th"></i> ELEKTROMATERIJAL</a>
      <a href="#work" class="w3-bar-item w3-button"><i class="fab fa-servicestack"></i> USLUGE</a>
      <a href="#pricing" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> KONTAKT</a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fas fa-building"></i> O NAMA</a> -->

      @foreach($items as $menu_item)
      <a href="{{ $menu_item->link() }}" class="w3-bar-item w3-button"><i class="{{ $menu_item->icon_class }}" style="margin-right: 5px;">
        </i>{{ $menu_item->title }}
        @if($menu_item->title === 'LISTA' && Cart::count() > 0)
        <span class="w3-badge w3-small w3-yellow" style="position:relative; top: -2px;">{{ Cart::count() }}</span>
        @endif
      </a>
      @endforeach

    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open_main_nav()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <!-- <ul>
    @foreach($items as $menu_item)
    <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
    @endforeach
  </ul> -->

  <nav class="w3-bar-block w3-collapse w3-theme-d3 w3-animate-left w3-hide-medium w3-hide-large" id="main_nav" style="display:none;z-index:99; width: 100%; max-width:250px; height: 100vh; position: absolute; top:0">
    <div class="w3-container w3-bottombar w3-border-yellow w3-white">
      <b>
        <p class="w3-left w3-text-yellow">ELEKTROPRIZMA</p>
      </b>
      <a href="javascript:void(0)" onclick="w3_close_main_nav()" class="w3-right w3-padding-large w3-hide-large" title="Close Menu">
        <i class="fa fa-remove"></i>
      </a>
    </div>
    @foreach($items as $menu_item)
    <a href="{{ $menu_item->link() }}" class="w3-bar-item w3-button"><i class="{{ $menu_item->icon_class }}" style="margin-right: 10px;">
      </i>{{ $menu_item->title }}
      @if($menu_item->title === 'LISTA' && Cart::count() > 0)
      <span class="w3-badge w3-small w3-yellow" style="position:relative; top: -2px;">{{ Cart::count() }}</span>
      @endif
    </a>
    @endforeach
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close_main_nav()" style="cursor:pointer" title="close side menu" id="main_nav_overlay"></div>

</div>