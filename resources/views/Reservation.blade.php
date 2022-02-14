@extends('layouts.app')

@section('content')
@if(!empty($reservations))
  @foreach($reservations as $reservation)
    <div class="row justify-content-center" style="width: 70%; margin:auto">

        <div class="col-md-8">
            <div class="card">

                <div style="font-weight:bold " class="card-header">
                        <span style="margin-top:20px">Route :{{$reservation['route']['from']}} - to - {{$reservation['route']['to']}}</span>
                        <br>
                        <span style="margin-top:20px">Time : {{$reservation['time']}}</span>
                         <br>
                        <span >receipt number : {{$reservation['receipt_number']}}</span> </span>
                        <br>
                        <span >Reservation created : {{$reservation['created_at']}}</span> </span>
                        @if ($reservation['status'] == 0)
                     <span style="margin: -110px  0 0 400px; width:102px;text-align:center;"class="btn btn-danger btn-lg">Pending<span>
                         @else
                     <span style="margin: -116px  0 0 400px; width:110px;text-align:center;"class="btn btn-success btn-lg">Accepted<span>

                       @endif
                    <text style="margin-left: 200px;"></text>
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
@endsection
