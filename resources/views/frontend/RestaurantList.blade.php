@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid" style="height:251px; ">
    <div class="col-sm-12" style="float:none;">
        <p class="text"  style="padding-left: 381px; padding-top: 60px; ">Order from restaurants</p>
        <p class="para-text" style="padding-left: 446px;">delivering to your door</p>
    </div>

</div>
<div class="sector">
    <p>Sector 15 A  <a href="{{ route('frontend.index') }}  ">CHANGE LOCATION</a></p>
</div>
<div class="restroList-page col-sm-12">
    <div class=" links col-sm-12">
        <a href="{{ route('frontend.index') }}">Home > </a> 
        <a href="#">Restaurant</a><br>
        <p class="filter"><i class="fa fa-filter" aria-hidden="true"> Filter Restaurants</i></p>

    </div>

    <div class="food-category-list col-sm-4">
        @foreach($category as $cat) 
        {{$cat->category}}<br>
        @endforeach
    </div>
    <div class=" restroList col-sm-8">

        <div class=" imagesList col-sm-1">
            @foreach($restro as $restaurant)
            <img  src="{{route('frontend.getentry', $restaurant->fileentries['filename'])}}" alt="ALT NAME" class="img-responsive" />
            @endforeach
        </div>
        <div class="detailsList col-sm-7">
            @foreach($restro as $restaurant)

            <a href="{{route('frontend.ViewMenu',['restro_id'=>$restaurant->id])}}"> {{$restaurant->name}}</a><br>

            @foreach($restaurant->groupedItems as $cate)



            @endforeach
            @endforeach

        </div>
        <div class="col-sm-4">
            
        </div>
    </div>
</div>
@endsection



