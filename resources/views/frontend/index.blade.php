@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-sm-12" style="float:none;">
        <p class="text">Order delicious food online!</p>
        <p class="para-text">Order food online from the best restaurants near you</p>
    </div>
    <div class="js-location-search location-search location-search-main-page  location_city_area  ">
        <div class="location-search-inner">
            <form action="{{route('frontend.search')}}" method="POST">
                {{ csrf_field() }}
                <div class="city">
                    <label for="cityId" class="required">Enter your city</label>
                    <div class="dropdown-typeahead-wrapper" id="wrapper-element-1">                   
                        {{Form::select('size', ['restaurant' => 'Restaurant', 'city' => 'City'], null, ['placeholder' => 'Search By....'])}}
                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                        </span></span>
                        <i class="icon-caret icon-down-arrow"></i>
                    </div>

                </div>

                <div class="area">
                    <label for="area" class="required">Enter your area</label>
                    <input type="text" data-url="{{route('frontend.search')}}" id="areaSearch" name="restaurantName" required="required" data-prefill="location.areaName" class="form-control tt-input enter-area" placeholder="Enter an area" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;">
                    <ul id="searchResults" data-url="{{route('frontend.search')}}">
                    </ul>
                </div>
                <div class="find-food">
                    {{ Form::submit('Show restaurants',['class' => 'btn btn-primary btn-block'])}}
                    {{ Form::close() }}


                </div>

            </form>

        </div>
        <div class="container-overlay"></div>
    </div>
</div>

    <div class="popular-restro">
        <div class="popular-head">
            <h2>Popular This Month In India</h2>

        </div>
        <div class="popular-images">
            {{ Html::image('img/frontend/biryani.jpeg','',array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/yochina.jpeg','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/papjohns.png','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/pizzahut.jpeg','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/rollmall.png','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/br.png','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/box8.png','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/subway.jpeg','', array('class' => 'thumb')) }}
        </div>
    </div>
    <div class="popular-restro">
        <div class="popular-head">
            <h2>India's Most Trusted Restaurants</h2>

        </div>
        <div class="trusted-images">
            {{ Html::image('img/frontend/pic1.jpg','',array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/pic2.jpg','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/pic3.jpg','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/pic4.jpg','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/pic5.jpg','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/pic6.jpg','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/pic7.jpg','', array('class' => 'thumb')) }}
            {{ Html::image('img/frontend/pic8.jpg','', array('class' => 'thumb')) }}
        </div>
    </div>

    @endsection