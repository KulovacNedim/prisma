@extends('layouts.app')

@section('title')
| {{ $product->name }}
@endsection

@section('content')

<p>{{ $product->name }}</p>
<p>{{ $product->slug }}</p>
<p>{{ $product->code }}</p>
<p>{{ $product->imageUrl }}</p>
<p>{{ $product->description }}</p>
<p>{{ $product->presentPrice() }}</p>
<p>{{ $product->quantity }}</p>
<p>{{ $product->isActive }}</p>

@endsection