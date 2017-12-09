@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid" style="height:251px; ">
    <div class="col-sm-12" style="float:none;">
        <p class="text"  style="padding-left: 381px; padding-top: 60px; ">Order from restaurants</p>
        <p class="para-text" style="padding-left: 446px;">delivering to your door</p>
    </div>

</div>
<div class="sector">
    <p>Sector 15 A  <a href="#">CHANGE LOCATION</a></p>
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

        <div class="col-sm-2">
        </div>
        <div class="col-sm-10">
            @foreach($restro as $restaurant)
           <img width=300 height=300 src="{{route('frontend.getentry', $restaurant->fileentries['filename'])}}" alt="ALT NAME" class="img-responsive" /><br><br>

               <a href="{{route('frontend.')}}"> {{$restaurant->name}}</a><br>

            @foreach($restaurant->groupedItems as $cate)
            
                
              
            @endforeach
            @endforeach

        </div>
    </div>
</div>
@endsection



