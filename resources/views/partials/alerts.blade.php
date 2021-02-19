@if(session('success'))
<div class="w3-panel w3-green">
  <i>
    <p>{{session('success')}}</p>
  </i>
</div>
@endif

@if(session('warning'))
<div class="w3-panel w3-yellow">
  <i>
    <p>{{session('warning')}}</p>
  </i>
</div>
@endif

@if(session('error'))
<div class="w3-panel w3-red">
  <i>
    <p>{{session('error')}}</p>
  </i>
</div>
@endif