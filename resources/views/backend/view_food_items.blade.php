@extends('backend.layouts.app')


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
<div class="items-table">
    <table>
        <thead>
            <tr>
                <th>
                    <a class="btn btn-primary" href="{{ route ('admin.addFoodItems',['restro_id'=>$restro->id]) }}">Add Items</a><br>

                </th>

                <th class="item-head">ITEM NAME</th>
                <th class="item-head">PRICE (<i class="fa fa-inr" aria-hidden="true">)</i></th>

            </tr>
        </thead>
        <tbody>

            @foreach($restro_items->restaurantItem as $items)
            <tr>
                <td class="item-data">{{$items->item_name}}</td>
                <td class="item-data"><i class="fa fa-inr" aria-hidden="true"></i> {{$items->price}}</td>
                <td class="item-data"> <a href="{{ route ('admin.restaurantitems.edit', ['restro_item_id'=>$items->id]) }}" class="btn btn-info btn-lg edit-del-btn">
                        <span class="glyphicon glyphicon-edit  edit-del "></span></td>
                <td class="item-data"> 
                    {{ Form::open(['route' => ['admin.restaurantitems.destroy', $items->id], 'method' => 'delete']) }}
                    {{ csrf_field() }}

                    {{Form::button('<span class="glyphicon glyphicon-trash edit-del"></span>', array('type' => 'submit', 'class' => 'btn btn-info btn-lg edit-del-btn del-btn'))}}
                    {{ Form::close() }}<br>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>

@endsection