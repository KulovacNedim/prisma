@extends('layouts.app')

@section('content')

@foreach($products as $product)
<a href="/products/{{ $product->id }}">
    <p>{{ $product->name }}</p>
    <p>{{ $product->slug }}</p>
    <p>{{ $product->code }}</p>
    <p>{{ $product->imageUrl }}</p>
    <p>{{ $product->description }}</p>
    <p>{{ $product->presentPrice() }}</p>
    <p>{{ $product->quantity }}</p>
    <p>{{ $product->isActive }}</p>
    <hr>
</a>
@endforeach

@endsection