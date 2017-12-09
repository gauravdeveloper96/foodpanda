@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-sm-12" style="float:none;">
        <p class="text">Order delicious food online!</p>
        <p class="para-text">Order food online from the best restaurants near you</p>
    </div>

</div>
<div class="restroList-page">
    <div class="food-category-list"></div>
    <div class=" restroList col-sm-8">

        <div class="col-sm-2">
        </div>
        <div class="col-sm-10">
            @foreach($restro as $restaurant)
            <a href="#"> {{$restaurant->name}}</a><br>

            @endforeach

        </div>
    </div>
</div>
@endsection



