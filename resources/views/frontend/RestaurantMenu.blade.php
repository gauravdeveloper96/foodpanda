@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid" style="height:251px; ">
    <div class="restro-head col-sm-12" >
        @foreach($RestroMenu as $rest)
        <img  src="{{route('frontend.getentry', $rest->fileentries['filename'])}}" alt="ALT NAME" class="img-responsive" />
        <div class="restro-title col-sm-12">
            <h1>  {{$rest['name']}}</h1>
            <?php $count = 1; ?>
            @foreach($RestroCat as $category)
            <li>  {{$category->category}}</li>
            @if($count==3)
            @break;
            @endif
            <?php $count++; ?>

            @endforeach
            @endforeach
        </div>
    </div>

</div>
<div class="sector">
    <p>Sector 15 A  <a href="{{ route('frontend.index') }}  ">CHANGE LOCATION</a></p>
</div>

<div class="restroList-page col-sm-12">
    <div class=" menu-links col-sm-12">
        <a href="{{ route('frontend.index') }}">Home > </a>
        <a href="#">Restaurant</a><br>

    </div>
    <div class=" restro-menu-list col-sm-12">

        <div class="col-sm-1"></div>
        <div class="restro-menu col-sm-8">
            <div class="restro-menu-links col-sm-12">
                <div class="restro-menu-link col-sm-1"><a href="#">Menu</a></div>
                <div class="review -link col-sm-1"><a href="#">Reviews</a></div>
                <div class="info-link col-sm-1"><a href="#">Info</a></div>
            </div>
            <div class="col-sm-12">
                <div class="menu-food-category-list col-sm-4">
                    @foreach($RestroCat as $category)
                    {{$category->category}}<br>
                    @endforeach
                </div>
                <div class=" restroList col-sm-8">



                    @foreach($RestroMenu as $rest)

                    @foreach($rest->items as $item)
                    <div class="item-detail col-sm-12">
                        <h5 class="item-name">   {{$item['name']}}</h5>
                        <h5 class="item-price">Rs.{{$item['price']}}</h5><br>
                    </div>
                    @endforeach
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <div class="my-order col-sm-3">

    </div>



</div>
</div>

@endsection

