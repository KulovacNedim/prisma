@extends('layouts.layout')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

  <div>
    <h1>Create a New Product</h1>
    <form action="/products" method="POST">
      @csrf
      <label for="name">Product Name</label>
      <input type="text" id="name" name="name">
      <fieldset>
        <label>Colors</label>
        <input type="checkbox" name="colors[]" value="red">Red <br>
        <input type="checkbox" name="colors[]" value="blue">Blue <br>
        <input type="checkbox" name="colors[]" value="yellow">Yellow <br>
      </fieldset>

      <input type="submit" value="Create Product">
    </form>
  </div>

</div>
@endsection