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
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

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
    {{ menu('main', 'partials.menus.main') }}

    <main class="" style="margin-top: 80px;">
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

        // sidebar accordion
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            var y = document.getElementById("sideBarServicesCarot");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-red";
            } else {
                x.className = x.className.replace(" w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-red", "");
            }
            if (y.className.indexOf("fa-caret-down") == -1) {
                y.className += " fa-caret-down";
                y.className = y.className.replace(" fa-caret-up", "");
            } else {
                y.className += " fa-caret-up";
                y.className = y.className.replace(" fa-caret-down", "");
            }
        }
    </script>
    <script>
        // top slider 
        var slideIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("coverSlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > x.length) {
                slideIndex = 1
            }
            x[slideIndex - 1].style.display = "block";
            setTimeout(carousel, 2700); // Change image every 2 seconds
        }

        // projects slider
        var projectIndex = 0;
        projectCarousel();

        function projectCarousel() {
            var j;
            var z = document.getElementsByClassName("projectSlides");
            for (j = 0; j < z.length; j++) {
                z[j].style.display = "none";
            }
            projectIndex++;
            if (projectIndex > z.length) {
                projectIndex = 1
            }
            z[projectIndex - 1].style.display = "block";
            setTimeout(projectCarousel, 2700); // Change image every 2 seconds
        }


        // accordion - categories
        function openCategoriesMenu(id) {
            var x = document.getElementById(id);
            var y = document.getElementById('cat_caret');
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
            // caret control
            if (y.className.indexOf("fa-caret-up") == -1) {
                y.className += " fa-caret-up";
            } else {
                y.className = y.className.replace(" fa-caret-up", "");
            }
        }
    </script>
    @include('sweetalert::alert')
</body>

</html>