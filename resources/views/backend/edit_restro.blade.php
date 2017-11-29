@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')
<div class="form-add-restro">
    {{Form::model($restroDetail, ['route' => ['admin.updateRestro', $restroDetail->id], 'files'=>true])}}
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

        {{Form::text('restro_name',ucwords($restroDetail->restro_name), array('class' => 'enter-text'))}}<br>

        {{Form::text('address', $restroDetail->address, array('class' => 'enter-text'))}}<br>

        {{Form::number('radius',$restroDetail->delivery_radius, array('class' => 'enter-text'))}}<br>

        {{Form::text('restro_owner', ucfirst($restroDetail->restro_owner), array('class' => 'enter-text'))}}<br>

        {{Form::text('restro_contact',$restroDetail->restro_contact, array('class' => 'enter-text'))}}<br>

        {{Form::file('restro_img', ['class' => 'enter-text'])}}<br>

        {{Form::text('restroLat',$restroDetail->restroLat, array('class' => 'enter-text'))}}<br>

        {{Form::text('restroLong',$restroDetail->restroLong, array('class' => 'enter-text'))}}<br>

        {{Form::label('true', 'True', ['class' => 'feature'])}}

        {{Form::radio('feature_restro','1')}}

        {{Form::label('false', 'False', ['class' => 'feature'])}}

        {{Form::radio('feature_restro','0')}}

    </div>
    {{Form::submit('Update Restaurant',['class'=>'add-restaurant'])}}

    {{ Form::close() }}
</div>
@endsection