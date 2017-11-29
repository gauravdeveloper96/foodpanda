@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection

@section('content')
<div class="row" ><br>
    <div class="col-xs-12">

        @foreach($restroDetail as $restro)
        <div class="col-sm-4" >
            <img width=300 height=300 src="{{ asset("images/$restro->restro_img")}}" > <br><br>

            <font size="3" color="blue"> <strong >Restaurant: </strong></font><b><i>{{$restro->restro_name}}</i></b><br> 

            <font size="3" color="blue"> <strong >Address: </strong></font><i>{{$restro->address}}</i><br>

            <a class="btn btn-primary" href="{{ route ('admin.editRestro',['restro_id'=>$restro->id]) }}">Edit Restaurant</a><br><br>
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
