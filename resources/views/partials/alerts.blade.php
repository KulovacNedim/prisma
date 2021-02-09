@if(session('success'))
<div class="w3-container">
  <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
    <i>
      <p>{{session('success')}}</p>
    </i>
  </div>
</div>
@endif

@if(session('warning'))
<div class="w3-container">
  <div class="w3-panel w3-pale-yellow w3-leftbar w3-border-yellow">
    <i>
      <p>{{session('warning')}}</p>
    </i>
  </div>
</div>
@endif

@if(session('error'))
<div class="w3-container">
  <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
    <i>
      <p>{{session('error')}}</p>
    </i>
  </div>
</div>
@endif