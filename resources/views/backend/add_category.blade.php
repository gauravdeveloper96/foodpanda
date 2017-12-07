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
    <div class="col-xs-3"></div>
    <div class="col-xs-6">
        <div align="center">
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
        </div>
    </div>
</div>
@endif
<div class="form-add-category">
    {{ Form::open(['route' => 'admin.categories.store']) }}
  
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
