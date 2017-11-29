@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')
<div class="form">
    {!! Form::open(['url' => 'foo/bar']) !!} 
  
    <div class="labels col-sm-2">

        {{Form::label('restro-name', 'Restaurant Name', ['class' => 'display-text'])}}<br>
        {{Form::label('address', 'Address', ['class' => 'display-text'])}}<br>
        {{Form::label('radius', 'Delivery Radius', ['class' => 'display-text'])}}<br>
        {{Form::label('owner', 'Owner Name',['class' => 'display-text'])}}<br>
        {{Form::label('phone', 'Restaurant Contact', ['class' => 'display-text'])}}<br>
        {{Form::label('features', 'Restaurant Features', ['class' => 'display-text'])}}<br>

    </div>
    <div class="text-fields col-sm-10">
        {{Form::text('restro-name','',['class' => 'enter-text'])}}<br>
        {{Form::text('address', '',['class' => 'enter-text'])}}<br>
        {{Form::number('radius','', ['class' => 'enter-text'])}}<br>
        {{Form::text('owner', '',['class' => 'enter-text'])}}<br>
        {{Form::text('phone','', ['class' => 'enter-text'])}}<br>
        {{Form::label('true', 'True', ['class' => 'feature'])}}
        {{Form::radio('feature')}}
        {{Form::label('false', 'False', ['class' => 'feature'])}}
        {{Form::radio('feature')}}

    </div>
    <a href="#">{{Form::submit('Add Restaurant',['class'=>'add-restaurant'])}}
    </a>
    {!! Form::close() !!}
</div>
@endsection
