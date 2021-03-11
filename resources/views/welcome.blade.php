@extends('layouts.app')

@section('content')
<!-- SLIDER -->
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

<!-- CATEGORIES AND TOP PRODACTS -->
<div class="w3-row w3-margin-top">
    <div class="w3-col w3-container l1 ">
    </div>
    <div class="w3-col w3-container l10 w3-center">
        <div class="w3-row w3-hide-large w3-margin-bottom" style=" height: 50px; ">
            <div class="w3-col w3-center">
                <button onclick="openCategoriesMenu('cat_acc')" class="w3-button w3-block w3-red w3-left-align w3-hover-red" style="height: 50px; width: 100%; ">KATEGORIJE <i id="cat_caret" class="fa fa-caret-down" style="margin-left: 8px;"></i></button>
                <div id="cat_acc" class="w3-hide">
                    @foreach($categories as $category)
                    <a class="w3-button w3-block w3-left-align w3-hover-red w3-border-bottom" style="width: 100%;" href="{{ route('shop.index', ['id' => $category->id, 'category' => $category->slug]) }}">
                        {{$category->name}}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w3-col l3 w3-center w3-hide-small w3-hide-medium" style="padding-right: 10px;">

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
        <div class="w3-col l9 w3-center">
            <div class="">
                <div class="w3-container w3-large w3-blue" style="height: 50px; display:flex; align-items: center">
                    TOP ARTIKLI
                </div>
                <div class="w3-row-padding">
                    @forelse($topProducts as $product)
                    <a href="{{ route('shop.show', [$product->id, $product->slug]) }}" class="w3-col m6 l3 w3-padding-16">
                        <div>
                            <div class="w3-border w3-round m5 l5" style="overflow: hidden; position:relative">
                                @if($product->is_discount)
                                <div style="position: absolute;top:7px; left:5px"><span class="w3-wide w3-tag w3-padding w3-round-large w3-orange w3-text-white w3-center w3-animate-left">AKCIJA!!!</span></div>
                                @endif
                                <img width="100%" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                                <div class="w3-container">
                                    <div class="">
                                        <b>
                                            <p class="w3-left-align" style="margin-bottom: 8px;">{{ $product->name }}</p>
                                        </b>
                                    </div>
                                    <div class="w3-row w3-margin-bottom">
                                        @if($product->new_price)
                                        <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center"><span class="w3-text-gray" style="margin-right: 10px;"><s>{{ $product->price }} </s></span>{{ $product->presentNewPrice() }}</span></div>
                                        @else
                                        <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center">{{ $product->presentPrice() }}</span></div>
                                        @endif
                                        <div class="w3-col s4 m4 l4">
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}" />
                                                <input type="hidden" name="name" value="{{ $product->name }}" />
                                                <input type="hidden" name="price" value="{{ $product->price }}" />
                                                <!-- <button class="w3-button w3-xlarge w3-teal">+</button> -->
                                                <button class="w3-button w3-blue w3-hover-red w3-right" type="submit"><i class="fas fa-cart-plus"></i></button>
                                            </form>
                                        </div>
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

<!-- SALE -->
<div class="w3-row w3-margin-top">
    <div class="w3-col w3-container l1 ">
    </div>
    <div class="w3-col w3-container l10 w3-center">


        <div class="w3-col  w3-center">
            <div class="">
                <div class="w3-container w3-large w3-red " style="height: 50px; display:flex; align-items: center">
                    AKCIJSKI ARTIKLI
                </div>
                <div class="" style="display: flex; flex-wrap: wrap;justify-content:space-around    ">
                    @forelse($saleProducts as $product)
                    <a href="{{ route('shop.show', [$product->id, $product->slug]) }}" class="w3-padding-16">
                        <div style="max-width: 200px;">
                            <div class="w3-border w3-round m5 l5" style="overflow: hidden; position:relative">
                                @if($product->is_discount)
                                <div style="position: absolute;top:7px; left:5px"><span class="w3-wide w3-tag w3-padding w3-round-large w3-orange w3-text-white w3-center w3-animate-left">AKCIJA!!!</span></div>
                                @endif
                                <img width="100%" src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                                <div class="w3-container">
                                    <div class="">
                                        <b>
                                            <p class="w3-left-align" style="margin-bottom: 8px;">{{ $product->name }}</p>
                                        </b>
                                    </div>
                                    <div class="w3-row w3-margin-bottom">
                                        @if($product->new_price)
                                        <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center"><span class="w3-text-gray" style="margin-right: 10px;"><s>{{ $product->price }} </s></span>{{ $product->presentNewPrice() }}</span></div>
                                        @else
                                        <div class="w3-col s8 m8 l8"><span class="w3-left" style="height: 38px;display: flex; align-items: center">{{ $product->presentPrice() }}</span></div>
                                        @endif
                                        <div class="w3-col s4 m4 l4">
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}" />
                                                <input type="hidden" name="name" value="{{ $product->name }}" />
                                                <input type="hidden" name="price" value="{{ $product->price }}" />
                                                <!-- <button class="w3-button w3-xlarge w3-teal">+</button> -->
                                                <button class="w3-button w3-blue w3-hover-red w3-right" type="submit"><i class="fas fa-cart-plus"></i></button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div>Trenutno ne postoje artikli na akciji</div>
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


@endsection