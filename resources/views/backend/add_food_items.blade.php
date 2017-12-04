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
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
        </div>
    </div>
</div>
@endif

<div class="form-add-category">
    {{ Form::open(['route' => 'admin.items.store']) }}
  
    <div class="labels col-sm-2">
         {{Form::label('restro-id', 'Restaurant Id', ['class' => 'display-text restro-id'])}}<br>
        {{Form::label('food-category', 'Select Food Category', ['class' => 'display-text'])}}<br>

        {{Form::label('item-name', 'Item Name', ['class' => 'display-text'])}}<br>
         {{Form::label('price', 'Item Price', ['class' => 'display-text'])}}<br>
        

    </div>
    <div class="text-fields col-sm-10">
        {{Form::text('restro-id',$restro_id,['class' => 'enter-text restro-id'])}}<br>
         {{Form::select('food-category',$category, null,['class' => 'enter-text'])}}<br>
        {{Form::text('item-name','',['class' => 'enter-text'])}}<br>
       
        {{Form::number('price','',['class' => 'enter-text'])}}
       

    </div>
    <a href="#">{{Form::submit('Add Food Item',['class'=>'add-category'])}}
    </a>
    {{ Form::close() }}
</div>
@endsection


