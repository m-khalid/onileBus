@extends('layouts.app')

@section('content')
 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
  <div style="margin-left:600px;  ">
 <form method="GET" action="{{ route('route.search') }}">
  <input style="border: 1px solid black;  border-radius: 4px;" size="30" placeholder="Route Search" type="text" id="search" name="search"><br>
     <button  style="margin:-44px 0 0  270px ;  width: 100px"type="submit" class="btn btn-primary btn-sm">Search</button>
</form>
</div>
<br>
@foreach($routes as $route)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
   <form method="GET" action="{{ route('route', ['route']) }}">
    @csrf
 {{ method_field('GET') }}
    <span style="font-weight: bold;font-size:24px; color:#700000 ">{{ $route->from}} - </span>
<text style="font-weight: bold;font-size:24px;color:#005916">{{ $route->to }}</text>
    <br>
    <span style=" margin-left:10px;font-weight: bold;font-size:16px; color:#505008" >{{ $route->description }}</span>
    <div style="margin:-20px 0 0 600px" >
<span style="font-weight:bold;font-size:18px; margin:0 0 0 15px " >{{ $route->price}} EGP</span>
</div>

    <br>
 @foreach ($route->times as $times)
 @if($loop->index > 2)
@break; @endif
    <span  style="margin-left:10px;  border-radius: 4px;border-style: outset; border-color: #E8E8E8;"> {{ $times->time}} </span>
@endforeach
    <a  href="{{ route('route', ['id',$route['id']]) }}"class="btn btn-primary btn-sm" style="margin-left:20px;background-color:#" >More ...</a> <!-- link for more details-->
<div style="margin:-40px 0 0px  600px">
       <a  href="{{ route('route', ['id',$route['id']]) }}"class="btn btn-success btn-sm" style="margin-left:10px; padding:7px 8px" >Book Now</a> <!-- link for more details-->

</div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach
@endsection
