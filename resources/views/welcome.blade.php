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

<!-- SEARCH -->
<div class="w3-row w3-margin-top w3-margin-bottom w3-hide-large">
    <div class="w3-col w3-container l1 ">
    </div>
    <div class="w3-col w3-container l10 w3-center">
        @include('partials.search-box')
    </div>
    <div class="w3-col w3-container l1 ">
    </div>
</div>

<!-- CATEGORIES AND TOP PRODACTS -->
<div class="w3-row w3-margin-top w3-margin-bottom">
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
                        @include('partials.product-card')
                    </a>
                    @empty
                    <div>Kategorija trenutno ne sadrži artikle</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="w3-col w3-container l1 ">
    </div>
</div>

<!-- SERVICES AND PROJECTS -->
<div class="w3-row w3-margin-top w3-margin-bottom">
    <div class="w3-col w3-container l1 ">
    </div>
    <div class="w3-col w3-container l10 w3-center">
        <div class="w3-col l7 w3-center" style="padding-right: 10px;">
            <div class="w3-container w3-large w3-blue" style="height: 50px; display:flex; align-items: center">
                USLUGE
            </div>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-around; align-content: space-around; min-height: 300px;">
                @foreach($services as $service)
                @if($service->show_on_landing_page)
                <div>
                    <a href="{{ route('service.show', [$service->id, $service->slug]) }}">
                        <div style="display: flex; align-items:center; justify-content:start; height: 90px; width: 250px; margin: 15px 0;" class="w3-light-gray w3-round">
                            @if($service->icon)
                            <div class="w3-text-light-blue w3-margin-right" style="font-size: 60px; margin: auto 8px;"><i class="{{ $service->icon }}"></i></div>
                            @else
                            <div class="w3-text-light-blue w3-margin-right" style="font-size: 60px; margin: auto 8px;"><i class="fas fa-cogs"></i></div>
                            @endif
                            <div style="text-align: left" class="w3-text-light-darkgray"><b>{{ strtoupper($service->title) }}</b></div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="w3-col l5 w3-center">
            <div class="">
                <div class="w3-container w3-large w3-blue" style="height: 50px; display:flex; align-items: center">
                    NAŠI PROJEKTI
                </div>
                <div class="w3-row-padding">
                    <div class="w3-display-container w3-margin-top">
                        @foreach($projects as $project)
                        <div class="w3-display-container projectSlides" style="max-height:400px; overflow:hidden; text-align:left;">
                            <img src="{{ slideImage($project->image) }}" style="width: 100%;max-height: 300px;" class="w3-animate-right;">
                            @if($project->title)
                            <div class="w3-hide-small w3-display-bottomleft w3-opacity-min w3-container w3-margin w3-white w3-round">
                                <b>
                                    <p class="w3-animate-left">{{ $project->title }}</p>
                                </b>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SALE -->
<div class="w3-row w3-margin-top w3-margin-bottom">
    <div class="w3-col w3-container l1 ">
    </div>
    <div class="w3-col w3-container l10 w3-center">


        <div class="w3-col  w3-center">
            <div class="">
                <div class="w3-container w3-large w3-red " style="height: 50px; display:flex; align-items: center">
                    AKCIJSKI ARTIKLI
                </div>
                <div style="display: flex; flex-wrap: wrap;justify-content:space-around">
                    @forelse($saleProducts as $product)
                    <a href="{{ route('shop.show', [$product->id, $product->slug]) }}" class="w3-padding-16">
                        <div style="max-width: 200px;">
                            @include('partials.product-card')
                        </div>
                    </a>
                    @empty
                    <div>Trenutno ne postoje artikli na akciji</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="w3-col w3-container l1 ">
    </div>
</div>

<!-- BRANDS -->
<div class="w3-row w3-margin-top w3-margin-bottom w3-light-gray w3-hide-small">
    <div class="w3-col w3-container l1 ">
    </div>
    <div class="w3-col w3-container l10 w3-center" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; min-height: 140px">
        @foreach($brands as $brand)
        <span class="w3-hide-small w3-hide-medium">
            <div style="width: 150px; margin: 20px;">
                <a href="{{$brand->link}}" target="_blank">
                    <img src="{{ slideImage($brand->image) }}" style="width: 100%;">
                </a>
            </div>
        </span>
        <span class="w3-hide-large">
            <div style="width: 100px; margin: 10px 20px;">
                <a href="{{$brand->link}}" target="_blank">
                    <img src="{{ slideImage($brand->image) }}" style="width: 100%;">
                </a>
            </div>
        </span>
        @endforeach
    </div>
    <div class="w3-col w3-container l1 ">
    </div>
</div>

@include('partials.footer')

@endsection