<form action="{{ route('search') }}" method="GET">
  <b>
    <span class="w3-button w3-text-gray w3-white w3-hover-white w3-hide-medium" style="display: flex; justify-content: center; align-items: center; height: 65px;">
      <button class="w3-button w3-white w3-hover-white" type="submit" style="padding-left: 0px; margin-left: 0px">
        <i class="fas fa-search w3-text-gray" style="margin: auto 15px;">
        </i>
      </button>
      <!-- <i class="fas fa-search" style="margin: auto 15px;">
      </i> -->
      <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="w3-border w3-input w3-white" placeholder="Pretraga...">
    </span>
  </b>
</form>