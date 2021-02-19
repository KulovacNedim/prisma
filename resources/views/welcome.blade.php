@extends('layouts.app')

@section('content')


<!-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
        @endauth
    </div>
    @endif -->

@can('manage-users')
<a href="{{ route('admin.users.index') }}">User Management</a><br>
@endcan
<a href="{{ route('shop.index') }}">Shop</a>
<a href="{{ route('cart.index') }}">Cart</a>

<hr>
@if(Cart::instance('default')->count() < 1) Nema artikala na listi @endif na listi ima {{ Cart::instance('default')->count() }} artikala <hr>
    @endsection