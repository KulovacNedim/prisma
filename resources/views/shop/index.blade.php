@extends('layouts.app')

@section('content')

@foreach($products as $product)
<a href="{{ route('shop.show', [$product->id, $product->slug]) }}">
  <p>{{ $product->name }}</p>
  <p>{{ $product->slug }}</p>
  <p>{{ $product->code }}</p>
  <p>{{ $product->imageUrl }}</p>
  <p>{{ $product->description }}</p>
  <p>{{ $product->presentPrice() }}</p>
  <p>{{ $product->quantity }}</p>
  <p>{{ $product->isActive }}</p>
  <p>{{ pathinfo('img/products/'.$product->imageUrl.'.jpg', PATHINFO_EXTENSION) }}</p>
  <img src="{{ pathinfo('img/products/'.$product->imageUrl.'.jpg', PATHINFO_EXTENSION) == 'jpg' ? asset('img/products/'.$product->imageUrl.'.jpg') : (pathinfo('img/products/'.$product->imageUrl.'.jpg', PATHINFO_EXTENSION) == 'jpeg' ? asset('img/products/'.$product->imageUrl.'.jpeg') : asset('img/products/'.$product->imageUrl.'.png')) }}" alt="">
  <hr>
</a>
@endforeach

@endsection