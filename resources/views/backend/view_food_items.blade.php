@extends('backend.layouts.app')

@section('content')

@foreach($restro_items->restaurantItem as $items)
   
{{$items->item_name}}
{{$items->price}}
<br>
@endforeach 

@endsection