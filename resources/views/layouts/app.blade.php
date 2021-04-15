<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}

    <!-- Scripts -->
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ route("welcome") }}/css/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/7f799c9eb6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

</head>

<body>
    @if(auth()->user() && auth()->user()->id == 2)
    {{ menu('main', 'partials.menus.main') }}
    <main class="" style="margin-top: 80px;">
        @yield('content')
    </main>
    @else
    NOT SHOWN
    @endif

    @yield('extra-js')


    @include('sweetalert::alert')
</body>

</html>