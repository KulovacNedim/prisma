@if ($paginator->hasPages())
<div class="w3-bar">
  <a href="{{ $paginator->previousPageUrl() }}" class="w3-button w3-hover-blue" style="max-width: 50px;">&laquo;</a>

  {{-- Pagination Elements --}}
  @foreach ($elements as $element)
  {{-- "Three Dots" Separator --}}
  @if (is_string($element))
  <span aria-disabled="true">
    <span class="">{{ $element }}</span>
  </span>
  @endif

  {{-- Array Of Links --}}
  @if (is_array($element))
  @foreach ($element as $page => $url)
  <a href="{{ $url }}" class="w3-button w3-hover-blue {{ $paginator->currentPage() == $page ? 'w3-blue' : '' }}" style="max-width: 50px;">{{ $page }}</a>

  @endforeach
  @endif
  @endforeach

  <a href="{{ $paginator->nextPageUrl() }}" class="w3-button w3-hover-blue" style="max-width: 50px;">&raquo;</a>
</div>
@endif