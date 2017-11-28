@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
<div class="form-group" >

<a href="{{route ('admin.addRestro')}}">
{{Form::submit('ADD RESTURANTS',['class'=>'add-restro'])}}
</a>
    <a href="{{route ('admin.addFoodCategory')}}">
{{Form::submit('ADD FOOD CATEGORIES',['class'=>'add-food'])}}
    </a>
{!! Form::close() !!}
</div>
@endsection
