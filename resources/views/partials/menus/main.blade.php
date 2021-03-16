<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar" style="height: 65px;">
    <a href="{{ route('welcome') }}" class="w3-bar-item w3-button w3-wide w3-hover-white" style="display: flex; justify-content: center; align-items:center; height: 65px;">
      <img src="{{ asset('img/ep.png') }}" alt="logo" style="height: 40px; margin-right:8px" class="w3-hide-small">
      <b><span class="w3-text-red w3-xlarge w3-hide-medium">ELEKTRO</span><span class="w3-text-blue w3-xlarge w3-hide-medium">PRIZMA</span></b>
    </a>
    <!-- Right-sided navbar links -->
    <div class="w3-left w3-hide-small">
      @foreach($items as $menu_item)
      @if($menu_item->title === 'USLUGE')
      <div class="w3-dropdown-hover">
        <a class="w3-bar-item w3-button w3-text-gray w3-hover-red" style="display: flex; justify-content: center; align-items:center; height: 65px;"><b><i class="{{ $menu_item->icon_class }}"></i> {{ $menu_item->title }}</b></a>
        <div class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 65px;">
          @foreach($services as $service)
          <a href="{{ route('service.show', [$service->id, $service->slug]) }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red">{{ $service->title }}</a>
          @endforeach
        </div>
      </div>
      @else
      <a href="{{ $menu_item->link() }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red" style="display: flex; justify-content: center; align-items:center; height: 65px;"><b><i class="{{ $menu_item->icon_class }}" style="margin-right: 5px;">
          </i>{{ $menu_item->title }}
          @if($menu_item->title === 'LISTA' && Cart::count() > 0)
          <span class="w3-badge w3-small w3-yellow count" style="position:relative; top: -2px;">{{ Cart::count() }}</span>
          @endif
        </b>
      </a>
      @endif
      @endforeach

    </div>
    <div class="w3-right w3-hide-small">
      @guest
      <!-- <a href="{{ route('register') }}" class="w3-bar-item w3-button"><i class="{{ $menu_item->icon_class }}" style="margin-right: 5px;"></i> REGISTRACIJA</a> -->
      <b><a href="{{ route('login') }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red" style="display: flex; justify-content: center; align-items:center; height: 65px;"><i class="fas fa-sign-in-alt" style="margin-right: 5px;"></i> LOGIN</a></b>
      @else

      <div class="w3-dropdown-hover">
        <b><a href="{{ route('users.edit') }}" class="w3-bar-item w3-button w3-text-gray w3-white w3-hover-red" style="display: flex; justify-content: center; align-items:center; height: 65px;"><i class="fas fa-user" style="margin-right: 5px;"></i> MOJ PROFIL</a></b>
        <div class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 65px;">
          <a href="{{ route('users.edit') }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red">Profil</a>
          <a href="{{ route('orders.index') }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red">Upiti</a>
        </div>
      </div>
      <b><a href="{{ route('logout') }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red" onclick="event.preventDefault();document.getElementById('logout-form').submit()" style="display: flex; justify-content: center; align-items:center; height: 65px;"><i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i> LOGOUT</a></b>
      @endguest
      <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>

    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-text-gray w3-hide-medium w3-hover-red" style="display: flex; justify-content: center; align-items:center;width:60px; height: 65px;" onclick="w3_open_main_nav()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <nav class="w3-bar-block w3-collapse w3-animate-left w3-hide-medium w3-hide-large w3-light-gray" id="main_nav" style="display:none; z-index:99; width: 100%; max-width:250px; height: 100vh; position: absolute; top:0">
    <div class="w3-row w3-light-gray" style="height: 65px;">
      <div class="w3-rest w3-container" style="height: 100%; display: flex; align-items: center">
        <b>
          <p class="w3-text-black w3-large">MENU</p>
        </b>
      </div>
    </div>
    <div>
      @guest
      <!-- <a href="{{ route('register') }}" class="w3-bar-item w3-button"><i class="{{ $menu_item->icon_class }}" style="margin-right: 5px;"></i> REGISTRACIJA</a> -->
      <b><a href="{{ route('login') }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red" style="height: 40px; display: flex;  align-items:center; border-bottom: 1px solid #999; margin-bottom: 10px;"><i class="fas fa-sign-in-alt" style="margin-right: 5px;"></i> LOGIN</a></b>
      @else
      <b><a href="{{ route('users.edit') }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red" style="height: 40px; display: flex;  align-items:center; border-top: 1px solid #999; margin-bottom: 10px;"><i class="fas fa-user" style="margin-right: 5px;"></i> MOJ PROFIL</a></b>
      <b><a href="{{ route('logout') }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red" onclick="event.preventDefault();document.getElementById('logout-form').submit()" style="height: 40px; display: flex;  align-items:center; border-bottom: 1px solid #999; margin-bottom: 10px;"><i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i> LOGOUT</a></b>
      @endguest
      <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </div>
    @foreach($items as $menu_item)
    @if($menu_item->title === 'USLUGE')
    <a href="{{ $menu_item->link() }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red" onclick="myAccFunc()"><b><i class="{{ $menu_item->icon_class }}" style="margin-right: 10px;">
        </i>{{ $menu_item->title }} <i class="fa fa-caret-down" style="margin-left: 8px;" id="sideBarServicesCarot"></i>
      </b>
    </a>
    <div id="demoAcc" class="w3-hide w3-white w3-card">
      @foreach($services as $service)
      <a href="{{ route('service.show', [$service->id, $service->slug]) }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red">{{ $service->title }}</a>
      @endforeach
    </div>
    @else
    <a href="{{ $menu_item->link() }}" class="w3-bar-item w3-button w3-text-gray w3-hover-red"><b><i class="{{ $menu_item->icon_class }}" style="margin-right: 10px;">
        </i>{{ $menu_item->title }}
        @if($menu_item->title === 'LISTA' && Cart::count() > 0)
        <span class="w3-badge w3-small w3-yellow count" style="position:relative; top: -2px;">{{ Cart::count() }}</span>
        @endif
      </b>
    </a>
    @endif
    @endforeach

  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close_main_nav()" style="cursor:pointer" title="close side menu" id="main_nav_overlay"></div>

</div>