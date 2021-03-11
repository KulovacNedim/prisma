@extends('layouts.app')

@section('content')
<div class="w3-row w3-margin-bottom">
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
    </div>
    <div class="w3-col w3-container l1 ">
    </div>
</div>
<div class="w3-row w3-margin-top">
    <div class="w3-col w3-container l1 ">
    </div>
    <div class="w3-col w3-container l10 w3-center">
        <div class="w3-row">
            <div class="w3-col s3 w3-center" style="padding-right: 10px;">
                <div class="w3-container w3-large w3-red" style="height: 50px; display:flex; align-items: center">
                    KATEGORIJE
                </div>
                <ul class="w3-ul w3-hoverable w3-large">
                    @foreach($categories as $category)
                    <a href="{{ route('shop.index', ['id' => $category->id, 'category' => $category->slug]) }}">
                        <li style="text-align: left" class="w3-hover-red w3-border-bottom">{{$category->name}}</li>
                    </a>
                    @endforeach
                </ul>
            </div>
            <div class="w3-col s9  w3-center">
                <div class="">
                    <div class="w3-container w3-large w3-blue" style="height: 50px; display:flex; align-items: center">
                        TOP ARTIKLI
                    </div>
                    <div class="w3-row-padding">
                        @forelse($topProducts as $product)
                        <a href="{{ route('shop.show', [$product->id, $product->slug]) }}" class="w3-col m6 l4 w3-padding-16">
                            <div>
                                <div class="w3-border w3-round m5 l5" style="overflow: hidden;">

                                    <img width="100%" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                                    <div class="w3-container w3-center">
                                        <b>
                                            <p class="w3-left-align">{{ $product->name }}</p>
                                        </b>
                                        <div class="w3-section w3-left-align">
                                            <span>{{ $product->presentPrice() }}</span>
                                            <span style="float: right;">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                                    <input type="hidden" name="name" value="{{ $product->name }}" />
                                                    <input type="hidden" name="price" value="{{ $product->price }}" />
                                                    <button class="w3-button w3-blue w3-hover-amber w3-tiny" type="submit">Dodaj na listu za upit</button>
                                                </form>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                        @empty
                        <div>Kategorija trenutno ne sadrži artikle</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
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