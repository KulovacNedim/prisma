<div class="w3-row w3-blue">
  <div class="w3-col w3-container l1 ">
  </div>
  <div class="w3-col w3-container l10" style="display:flex; align-items: center;">
    <div class="w3-row" style="width: 100%;">
      <div class="w3-col l9">
        <div class="w3-row w3-margin-top w3-margin-bottom">
          <span style="display: flex; flex-wrap: wrap;">
            @foreach($sailPoints as $sp)
            <div style="flex: 1; margin: 5px 12px; min-width: 300px;">
              <h6 class="w3-large w3-border-bottom w3-border-orange">{{ strtoupper($sp->title) }}</h6>
              <span style="display: block; margin-bottom: 7px;"><i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i> {{ $sp->address }}</span>
              <span style="display: block; margin-bottom: 7px;"><i class="fas fa-phone-alt" style="margin-right: 5px;"></i> {{ $sp->phone_retail }}</span>
              @if($sp->email)
              <span style="display: block; margin-bottom: 7px;"><i class="fas fa-envelope" style="margin-right: 5px;"></i> {{ $sp->email }}</span>
              @else
              <span style="display: block; margin-bottom: 7px;"><i class="fas fa-envelope w3-text-blue" style="margin-right: 5px;"></i> {{ $sp->email }}</span>
              @endif
            </div>
            @endforeach
          </span>
        </div>
      </div>
      <div class="w3-col l3 w3-hide-small w3-hide-medium" style="display: flex; flex-direction: column; align-items: flex-end; margin-top:12px">
        <p>
          Potražite nas i na facebooku:
        </p>
        <div><a href="https://www.facebook.com/profile.php?id=100010520945591" target="_blank"><img src="{{ asset('/img/facebook.png') }}" alt="facebook icon" style="max-width: 150px; cursor: pointer;"></a></div>
      </div>
      <div class="w3-col l3 w3-hide-large" style="display: flex; flex-direction: column; align-items: center;">
        <p>
          Potražite nas i na facebooku:
        </p>
        <div><a href="https://www.facebook.com/profile.php?id=100010520945591" target="_blank"><img src="{{ asset('/img/facebook.png') }}" alt="facebook icon" style="max-width: 150px; cursor: pointer;"></a></div>
      </div>
    </div>
  </div>
  <div class="w3-col w3-container l1 ">
  </div>
</div>
<div class="w3-row w3-text-white w3-margin-bottom" style="background-color: #0d8bf2;">
  <div class="w3-container w3-center" style="margin: 7px 0;">
    &#169; ELEKTROPRIZMA {{ now()->year }}
  </div>
</div>