@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="font-weight:bold " class="card-header">{{$selected->from}} - to - {{$selected->to}}
                    <text style="margin-left: 200px;">{{$selected->price}} EGP</text>
                </div>

                <div class="card-body">
   <form method="GET" action="{{ route('route', ['route']) }}">
    @csrf
 {{ method_field('GET') }}
<label for="routes">Choose a Route:</label>
<select name="routes" id="routes">
    <option value="none" selected disabled hidden>{{$selected->from}} - to - {{$selected->to}} </option>
@foreach($routes as $route)
    <option value="{{$route->id}}">{{$route->from}} - to - {{$route->to}} </option>
    @endforeach
</select>
    <button style="margin-left:30px"class="btn btn btn-primary btn-sm" type="submit">change route</button>


</form>
<br>

<!-- send time and trip to reservation -->
<form method="POST" action="{{ route('reservation',['time']) }}">
        @csrf
 {{ method_field('POST') }}
<label for="time">Choose a Time:</label>
<select name="time" id="time">
    <option value="none" selected disabled hidden>Select an Option</option>
@foreach($times as $time)
    <option value="{{$time->id}}">{{$time->time}} </option>
    @endforeach
</select>
<br>
<br>
    <button style="margin-left:270px"class="btn btn btn-success " type="submit">BOOK</button>

                </div>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
<br>
    <div style="text-align: center;width:30%;margin-left:520px"class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
@endsection
