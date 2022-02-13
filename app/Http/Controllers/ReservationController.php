<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Reservation;
use App\Route;
class ReservationController extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $uri = \Request::getRequestUri();
        $id = parse_url($uri)['query'];
       $reservations= Reservation::join ('times', 'times.id', '=', 'reservations.reservation_id')
        ->where('reservations.user_id','=',$id)->get();
        foreach ($reservations as $reservation)
        {
            $reservation['route']=Route::where('id','=',$reservation->route_id)->first();


        }

        return view('reservation',compact('reservations'));

    }

    public function create(Request $request)
    {
        // return $request->time;

        $data=array('reservation_id'=>$request->time,'user_id'=>Auth::user()->id,'status'=>0,'receipt_number'=>rand(10000, 99999));
       Reservation::insert($data);
        $message="pending";
return redirect()->route('home')->with('alert', 'Pending Request');

    }

}
