@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection

@section('content')
@if(Session::has('message'))
<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <div align="center">
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
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

            <a class="btn btn-primary" href="{{ route ('admin.editRestro',['restro_id'=>$restro->id]) }}">Edit Restaurant</a><br>
            <br>

            <a class="btn btn-primary" href="{{ route ('admin.deleteRestro',['restro_id'=>$restro->id]) }}">Delete Restaurant</a><br><br>
            <br>

        </div>
        @endforeach
    </div>
</div>
<div class="form-group " >

    <a href="{{route ('admin.addRestro')}}">
        {{Form::submit('ADD RESTURANTS',['class'=>'add-restro'])}}
    </a>
    <a href="{{route ('admin.addFoodCategory')}}">
        {{Form::submit('ADD FOOD CATEGORIES',['class'=>'add-food'])}}
    </a>
    {!! Form::close() !!}
</div>
@endsection
