@extends('frontend.layouts.app')

@section('content')
<div class="page-back">
    <div class="col-sm-12">
        <p class="text">Order delicious food online!</p>
        <p class="para-text">Order food online from the best restaurants near you</p>
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

@endsection