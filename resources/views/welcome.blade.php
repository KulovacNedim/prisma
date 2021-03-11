@extends('layouts.app')

@section('content')
<div class="w3-row">
    <div class="w3-col w3-container l1 ">
    </div>

    <div class="w3-col w3-container l10 w3-center">
        <div class="w3-display-container">

            @foreach($slides as $slide)
            <div class="w3-display-container coverSlides" style="max-height:400px; overflow:hidden; text-align:left">
                <img src="{{ slideImage($slide->images) }}" style="width: 100%;" class="w3-animate-right">
                @if($slide->title || $slide->description)
                <div class="w3-hide-small w3-display-topleft  w3-opacity-min w3-container w3-padding-16 w3-margin w3-white w3-round">
                    <b>
                        <p class="w3-animate-left">{{ $slide->title }}</p>
                    </b>
                    <p class="w3-animate-left w3-small" style="max-width: 250px">{{ $slide->description }}</p>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <!-- <div class="w3-display-container">

            <div class="w3-display-container coverSlides" style="max-height:400px; overflow:hidden; text-align:left">
                <img src="http://elektroprizma.ba/slider-images/l.jpg" style="width: 100%;" class="w3-animate-right">
                <div class="w3-hide-small w3-display-topleft  w3-opacity-min w3-container w3-padding-16 w3-margin w3-white w3-round">
                    <b>
                        <p class="w3-animate-left">USLUGE</p>
                    </b>
                    <p class="w3-animate-left w3-small" style="max-width: 250px">Generate Lorem Ipsum placeholder text for use in your graphic, print and web layouts, and discover</p>
                </div>
            </div>

            <div class="w3-display-container coverSlides " style="max-height:400px; overflow:hidden">
                <img src="http://elektroprizma.ba/slider-images/ff.jpg" style="width: 100%;" class="w3-animate-right">
                <div class="w3-hide-small w3-display-topleft  w3-opacity-min w3-container w3-padding-16 w3-margin w3-white w3-round">
                    <b>
                        <p class="w3-animate-left">USLUGE 1</p>
                    </b>
                    <p class="w3-animate-left w3-small" style="max-width: 250px">Generate Lorem Ipsum placeholder text and discover</p>
                </div>
            </div>
            <div class="w3-display-container coverSlides " style="max-height:400px; overflow:hidden">
                <img src="http://elektroprizma.ba/slider-images/2.jpg" style="width: 100%;" class="w3-animate-right">
                <div class="w3-hide-small w3-display-topleft  w3-opacity-min w3-container w3-padding-16 w3-margin w3-white w3-round">
                    <b>
                        <p class="w3-animate-left">USLUGE 2</p>
                    </b>
                    <p class="w3-animate-left w3-small" style="max-width: 250px">Generate Lorem Ipsum placeholder text for use in your graphic, print and web layouts, and discover</p>
                </div>
            </div>
            <div class="w3-display-container coverSlides " style="max-height:400px; overflow:hidden">
                <img src="https://www.w3schools.com/w3css/img_snowtops.jpg" style="width: 100%;" class="w3-animate-right">
                <div class="w3-hide-small w3-display-topleft  w3-opacity-min w3-container w3-padding-16 w3-margin w3-white w3-round">
                    <b>
                        <p class="w3-animate-left">USLUGE 3</p>
                    </b>
                    <p class="w3-animate-left w3-small" style="max-width: 250px">Generate Lorem Ipsum placeholder text for use in your graphic, print and web layouts, and discover</p>
                </div>
            </div>




        </div> -->

    </div>
    <div class="w3-col w3-container l1 ">
    </div>
</div>
@endsection

@section('extra-js')
<script>
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
</script>


@endsection