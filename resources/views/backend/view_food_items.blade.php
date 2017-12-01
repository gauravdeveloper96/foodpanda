@extends('backend.layouts.app')

@section('content')
<div class="items-table">
    <table>
        <thead>
            <tr>
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