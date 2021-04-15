// Main navigation script necessery on every page

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

        function currentSlide(n) {
            showSlide(slideIndex = n);
        }

        function showSlide(n) {
            var i;
            var slides = document.getElementsByClassName("productSlides");
            var thumbs = document.getElementsByClassName("thumb");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < thumbs.length; i++) {

                if (thumbs[i].classList.contains("w3-border-blue")) {
                    thumbs[i].className = thumbs[i].className.replace(" w3-border-blue", " w3-border-light-grey");
                }
            }
            slides[slideIndex - 1].style.display = "block";
            if (thumbs[slideIndex - 1].classList.contains("w3-border-light-grey")) {
                thumbs[slideIndex - 1].className = thumbs[slideIndex - 1].className.replace("w3-border-light-grey", "w3-border-blue");
            }
        }
