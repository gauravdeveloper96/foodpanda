@extends('backend.layouts.app')

@section('content')

@foreach($restro_items as $items)

{{$items->item_name}}
{{$items->price}}

@endforeach 

@endsection