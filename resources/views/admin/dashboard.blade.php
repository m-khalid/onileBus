<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset=UTF-8>
  <meta name=viewport content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin=anonymous>
  <title>Admin Dashboard</title>
</head>
<body>

                <div style="width:50%; margin:auto; font-weight:bold" class="card-header">
<a style="margin-left:40px; font-size: 20px; color:black; " href="{{ route('admin.dashboard') }}">Admin</a>

          <a style="margin-left:40%"  class="btn btn-secondary" href="{{ route('admin.add.route') }}">Add Route</a>
          <a class="btn btn-danger"style="margin-left:5%" href="/admin/logout" >Logout</a>

</div>
<br>
<br>
<div style="margin-left:600px;  ">
 <form method="POSt" action="{{ route('admin.reservation.search') }}">
     @csrf
  <input style="border: 1px solid black;  border-radius: 4px;" size="30" placeholder="receipt number" type="text" id="search" name="search"><br>
     <button  style="margin: -50px 0 0  270px ;  width: 100px"type="submit" class="btn btn-primary btn-sm">Search</button>
</form>
</div>
<br>
@if(!empty($reservations))
  @foreach($reservations as $reservation)
    <div class="row justify-content-center" style="width: 70%; margin:auto">

        <div class="col-md-8">
            <div class="card">

                <div style="font-weight:bold " class="card-header">

                        <span style="margin-top:20px">Route :{{$reservation['route']['from']}} - {{$reservation['route']['to']}}</span>
                        <br>
                        <span style="margin-top:20px">Time : {{$reservation['time']}}</span>

                       <a style="margin-left:45%"class="btn btn-success" href="{{ route('admin.active', ['id' , $reservation['id']]) }}" >Active</a>
                     <a  style="margin: -66px  0 0 562px"class="btn btn-danger" href="{{ route('admin.ignore', ['id' , $reservation['id']]) }}"
>Ignore</a>
                    <text style="margin-left: 200px;"></text>
                </div>
                <div class="card-body">
<p> <span style="font-weight:bold">User: </span>{{$reservation['name']}}</p>
<p> <span style="font-weight:bold">email: </span> {{$reservation['email']}}</p>
<p> <span style="font-weight:bold">Price: </span> {{$reservation['route']['price']}} L.E</p>
<p> <span style="font-weight:bold">Receipt Number: </span> {{$reservation['receipt_number']}}</p>
                </div>
            </div>
        </div>
    </div>
<br>
    @endforeach

@else
                <div style="font-weight:bold " class="card-header">
                <span style="margin-left:700px">
                Not Found  Reservations
                </span>
                </div>
@endif
</body>
</html>
