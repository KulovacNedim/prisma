LISTA ZA upit
<hr>
@if(session()->has('success_message'))
<div>
  <p>
    {{ session()->get('success_message') }}
  </p>
</div>
@endif

@if(count($errors) > 0)
<div>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if (Cart::count() > 0)
artikala na listi ima: {{ Cart::count() }}

@else
<h3>Nema artikala na listi</h3>
@endif

@foreach(Cart::content() as $item)
<a href="{{ route('shop.show', [$item->model->id, $item->model->slug]) }}">
  <div>
    <p> {{ $item->model->name }} || {{ $item->model->price }}</p>
  </div>
</a>
@endforeach