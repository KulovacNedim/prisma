<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ route("welcome") }}/css/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/7f799c9eb6.js" crossorigin="anonymous"></script>


    <style>
        body {
            font-family: 'Nunito';
            background-color: #f7f8f9;
        }

        .w3-button {
            width: 150px;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }

        a {
            text-decoration: none;
        }

        .invalid-feedback {
            display: block;
            margin-top: -5;
            margin-bottom: 22px;
            color: red;
        }

        .w3-sidebar {
            z-index: 3;
            width: 250px;
            top: 60px;
            bottom: 0;
            height: inherit;
        }

        .coverSlides {
            display: none;
        }
    </style>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css"> -->
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
</head>

<body>


    {{ menu('main', 'partials.menus.main') }}

    <main class="" style="margin-top: 80px;">
        <!-- @include('partials.alerts') -->
        @yield('content')
    </main>


    @yield('extra-js')

    <!-- Main navigation script necessery on every page -->
    <script>
        // Get the Sidebar
        var mainNav = document.getElementById("main_nav");
        // Get the DIV with overlay effect
        var mainNavOverlay = document.getElementById("main_nav_overlay");
        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open_main_nav() {
            if (main_nav.style.display === 'block') {
                main_nav.style.display = 'none';
                mainNavOverlay.style.display = "none";
            } else {
                main_nav.style.display = 'block';
                mainNavOverlay.style.display = "block";
            }
        }
        // Close the sidebar with the close button
        function w3_close_main_nav() {
            main_nav.style.display = "none";
            mainNavOverlay.style.display = "none";
        }
        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mainNav = document.getElementById("mainNav");
    </script>
</body>

</html>