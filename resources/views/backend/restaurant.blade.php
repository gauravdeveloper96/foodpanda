@extends('backend.layouts.app')

@section('content')

@if(Session::has('message'))
<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <div align="center">
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
        </div>
    </div>
</div>
@endif

<div class="row" ><br>
    <div class="col-xs-12">

        @foreach($restroDetail as $restro)

        <div class="col-sm-4" >
            <img width=300 height=300 src="{{ asset("images/$restro->restro_img")}}" > <br><br>

            <font size="3" color="blue"> <strong >Restaurant: </strong></font><b><i>{{$restro->restro_name}}</i></b><br>

            <font size="3" color="blue"> <strong >Address: </strong></font><i>{{$restro->address}}</i><br>
            <a class="btn btn-primary" href="{{ route ('admin.addFoodItems',['restro_id'=>$restro->id]) }}">Add Items</a><br>
            <br>
            <a class="btn btn-primary" href="{{ route ('admin.restaurants.edit',['restro_id'=>$restro->id]) }}">Edit Restaurant</a><br>
            <br>
            <a class="btn btn-primary" href="{{ route ('admin.restaurants.show',['restro_id'=>$restro->id]) }}">Restaurant Menu</a><br>
            <br>


            {{ Form::open(['route' => ['admin.restaurants.destroy', $restro->id], 'method' => 'delete']) }}
            {{ csrf_field() }}
            {{ Form::submit('Delete Restaurant',['class' => 'btn btn-primary'])}}
            {{ Form::close() }}<br>

        </div>
        @endforeach
    </div>
</div>
@endsection
