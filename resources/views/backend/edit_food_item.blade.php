@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')
<div class="form-add-category">
    
    {{Form::model($restroItemsDetail, ['route' => ['admin.restaurantitems.update', $restroItemsDetail->id]])}}
    {{csrf_field()}}
    {{ method_field('PUT') }}

    <div class="labels col-sm-2">
        {{Form::label('category_id', 'Category Id', ['class' => 'display-text disable'])}}<br>

        {{Form::label('restro_id', 'Restro Id', ['class' => 'display-text disable'])}}<br>
        {{Form::label('item-name', 'Item Name', ['class' => 'display-text'])}}<br>
        {{Form::label('price', 'Item Price', ['class' => 'display-text'])}}<br>


    </div>
    <div class="text-fields col-sm-10"> 
         {{Form::number('category_id',$restroItemsDetail->category_id, array('class' => 'enter-text disable'))}}<br>
        {{Form::number('restro_id',$restroItemsDetail->restaurant_id, array('class' => 'enter-text disable'))}}<br>
        {{Form::text('item-name',ucwords($restroItemsDetail->item_name), array('class' => 'enter-text'))}}<br>

        {{Form::number('price',$restroItemsDetail->price, array('class' => 'enter-text'))}}


    </div>
    {{Form::submit('Update Food Item',['class'=>'add-category'])}}

    {{ Form::close() }}
</div>
@endsection




