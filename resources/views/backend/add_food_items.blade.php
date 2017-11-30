@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')
<div class="form-add-category">
    {{ Form::open(['route' => 'admin.restaurantitems.store']) }}
  
    <div class="labels col-sm-2">
        {{Form::label('food-category', 'Select Food Category', ['class' => 'display-text'])}}<br>

        {{Form::label('item-name', 'Item Name', ['class' => 'display-text'])}}<br>
         {{Form::label('price', 'Item Price', ['class' => 'display-text'])}}<br>
        

    </div>
    <div class="text-fields col-sm-10">
         {{Form::select('food-category',$category, null,['class' => 'enter-text'])}}<br>
        {{Form::text('item-name','',['class' => 'enter-text'])}}<br>
       
        {{Form::number('price','',['class' => 'enter-text'])}}
       

    </div>
    <a href="#">{{Form::submit('Add Food Item',['class'=>'add-category'])}}
    </a>
    {{ Form::close() }}
</div>
@endsection


