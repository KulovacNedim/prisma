@extends('layouts.layout')

@section('content')

<br>
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">



                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                    </div>

                    <div class="ml-12">
                        {{ $product->name }}
                    </div>
                    <div>
                        <p>Colors:</p>
                        <ul>
                            @foreach($product->colors as $color)
                            <li>{{ $color }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>

                    <form action="/products/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete product</button>
                    </form>

                    <hr>

                    <a href="/products"> Back to all products</a>

                </div>
            </div>
        </div>





    </div>
</div>
@endsection