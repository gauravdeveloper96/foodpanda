@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')
<div class="form-add-restro">
    {{ Form::open(['route' => 'admin.storeRestro', 'file'=>'true']) }}
    {{csrf_field()}}

    <div class="labels col-sm-3">

        {{Form::label('restro-name', 'Restaurant Name', ['class' => 'display-text'])}}<br>
        {{Form::label('address', 'Address', ['class' => 'display-text'])}}<br>
        {{Form::label('radius', 'Delivery Radius', ['class' => 'display-text'])}}<br>
        {{Form::label('owner', 'Owner Name',['class' => 'display-text'])}}<br>
        {{Form::label('phone', 'Restaurant Contact', ['class' => 'display-text'])}}<br>
        {{Form::label('image', 'Restaurant Logo', ['class' => 'display-text'])}}<br>
        {{Form::label('latitude', 'Latitude', ['class' => 'display-text'])}}<br>
        {{Form::label('longitude', 'Longitude', ['class' => 'display-text'])}}<br>
        {{Form::label('features', 'Restaurant Features', ['class' => 'display-text'])}}<br>

    </div>
    <div class="text-fields col-sm-9">
        {{Form::text('restro-name','',['class' => 'enter-text'])}}<br>
        {{Form::text('address', '',['class' => 'enter-text'])}}<br>
        {{Form::number('radius','', ['class' => 'enter-text'])}}<br>
        {{Form::text('owner', '',['class' => 'enter-text'])}}<br>
        {{Form::text('phone','', ['class' => 'enter-text'])}}<br>
        {{Form::file('image', ['class' => 'enter-text'])}}<br>
        {{Form::text('latitude','30.7515° N', ['class' => 'enter-text'])}}<br>
        {{Form::text('longitude','76.7726° E', ['class' => 'enter-text'])}}<br>
        {{Form::label('true', 'True', ['class' => 'feature'])}}
        {{Form::radio('feature','1')}}
        {{Form::label('false', 'False', ['class' => 'feature'])}}
        {{Form::radio('feature','0')}}

    </div>
    {{Form::submit('Add Restaurant',['class'=>'add-restaurant'])}}
    
    {{ Form::close() }}
</div>
@endsection
