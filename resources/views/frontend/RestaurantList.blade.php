@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-sm-12" style="float:none;">
        <p class="text">Order delicious food online!</p>
        <p class="para-text">Order food online from the best restaurants near you</p>
    </div>
  
</div>
<div class="restroList">
    @foreach($restro as $restraurant)
</div>
@endsection



