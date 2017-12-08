@extends('frontend.layouts.app')

@section('content')
    <div class="container-fluid">
    <div class="col-sm-12" style="float:none;">
        <p class="text">Order delicious food online!</p>
        <p class="para-text">Order food online from the best restaurants near you</p>
    </div>
    <div class="js-location-search location-search location-search-main-page  location_city_area  location">
        <div class="location-search-inner search">
            <form name="" method="get" action="/location-suggestions" role="form" class="form-vertical" novalidate="novalidate" autocomplete="off">
               

                <div class="area">
                    <label for="area" class="required">Enter your area</label>
                    <input  type="text" class="enter-area" class="enter" value="Enter your area"/>
                </div>
                <div class="find-food">
                    <button type="submit" id="button" name="button" class="btn btn-primary btn-block show-restro">Show restaurants</button>

                   
                </div>
               
            </form>
        </div>
    </div>
    <div class="container-overlay"></div>
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
