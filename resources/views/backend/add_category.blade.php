@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')
<div class="form-add-category">
    {{ Form::open(['route' => 'admin.storeFoodTypes']) }}
  
    <div class="labels col-sm-2">

        {{Form::label('food-category', 'Food Category', ['class' => 'display-text'])}}<br>
        

    </div>
    <div class="text-fields col-sm-10">
        {{Form::text('food-category','',['class' => 'enter-text'])}}<br>
       

    </div>
    <a href="#">{{Form::submit('Add Food Category',['class'=>'add-category'])}}
    </a>
    {{ Form::close() }}
</div>
@endsection
